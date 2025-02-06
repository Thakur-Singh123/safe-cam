<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\TrashContact;

class ContactController extends Controller
{
    //Function for get all contacts
    public function all_contacts() {
        //Get contacts
        $all_contacts = ContactUs::Orderby('ID', 'DESC')->where('status', 'Active')->get();
        return view('admin.contacts.all-contacts', compact('all_contacts'));
    }

    //Function for all contacts trash records
    public function all_contacts_trash() {
        //Get trash contacts
        $all_contacts = ContactUs::whereIn('status', ['Pending', 'Suspend', 'Approved'])->orderBy('id', 'DESC')->get();
        return view('admin.contacts.all-contacts-trash-list', compact('all_contacts'));
    }

    //Function for edit contact
    public function edit_contact($id) {
        //Get contact
        $contact_detail = ContactUs::find($id);
        return view('admin.contacts.edit-contact', compact('contact_detail'));
    }

    //Function for delete contact
    public function delete_contact(Request $request) {
        //Get ajax request
        $contact_id = $request->contact_id;
        //Update contact
        $is_delete_contact = ContactUs::where('id', $contact_id)->update([
            'status' => 'pending']);
        //Check if contact deleted or not
        if ($is_delete_contact) {
            TrashContact::create([
                'contact_id' =>$contact_id,
            ]);
            echo '<p style="color:gree;">Contact deleted successfully.</p>';
            echo '<script>setTimeout(function(){ window.location.href = ""; }, 3000);</script>';
        } else {
            echo '<p style="color=red;">Opps something went wrong.</p>';
        } 
    }

    //Function for update contact
    public function update_contact(Request $request, $id) {
        $is_update_contact = ContactUs::where('id', $id)->update([
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'Active',
        ]);
        //Check if contact updated or not
        if ($is_update_contact) {
            TrashContact::where('contact_id', $id)->delete();
            return back()->with('success', 'Contact updated successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong.');
        }
    }

    //Function for delete parament delete record
    public function delete_parament_contact(Request $request) {
        //Get ajax request
        $contact_id = $request->contact_id;
        //Delete contact
        $is_delete_contact = ContactUs::where('id', $contact_id)->delete();
        //Check if contact deleted or not
        if ($is_delete_contact) {
            TrashContact::where('contact_id', $contact_id)->delete();
            return back()->with('Contact deleted successfully.');
        } else {
            return back()->with('Opps something went wrong!');
        }
    }
}
