<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\TrashService;

class ServiceController extends Controller
{
    //Function for add service
    public function add_service() {
        return view('admin.services.add-new-service');
    }

    //Function for submit service
    public function submit_service(Request $request) {
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/services'), $filename);
        }
        //Create service
        $is_create_service = Service::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'desc' => $request->desc,
            'status' => 'Active',
            'image' => $filename,
        ]);
        //Check if service created or not
        if ($is_create_service) {
            return back()->with('success', 'Service created successfully.');
        } else {
            return back()->with('unsucces', 'Opps something went wrong!');
        }
    }

    //Function for all services
    public function all_services() {
        //Get services 
        $all_services = Service::Orderby('ID', 'DESC')->where('status', 'Active')->get();
        return view('admin.services.all-services-list', compact('all_services'));
    }

    //Function for all services trash
    public function all_services_trash() {
        //Get services trash
        $all_trash_services = Service::Orderby('ID', 'DESC')->where('status', ['Pending','Suspend','Suspend'])->get();
        return view('admin.services.all-services-trash-list', compact('all_trash_services'));
    }

    //Function for edit service
    public function edit_service($id) {
        //Get detail
        $service_detail = Service::find($id);
        return view('admin.services.edit-service', compact('service_detail'));
    }

    //Function for update service
    public function update_service(Request $request, $id) {
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/services'), $filename);
            //Update service with image
            $is_update_service = Service::where('id', $id)->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'desc' => $request->desc,
                'status' => 'Active',
                'image' => $filename,
            ]);
            //Check if service updated or not
            if ($is_update_service) {
                return back()->with('success', 'Service updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong.');
            }
        } else {
            //Update service without imag
            $is_update_service = Service::where('id', $id)->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'desc' => $request->desc,
                'status' => 'Active',
            ]);
            //Check if service updated or not
            if ($is_update_service) {
                return back()->with('success', 'Service updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong.');
            }
        }
    }

    //Function for trash service 
    public function trash_service(Request $request) {
        //Get ajax request
        $service_id = $request->service_id;
        //Trash sservice
        $trash_service = Service::where('id', $service_id)->update([
            'status' => 'Pending'
        ]);  
        //Check if service trashed or not
        if ($trash_service) {
            //Check if service id exists or not
            $existingTrashService = TrashService::where('service_id', $service_id)->exists();
            //Check service created or not
            if (!$existingTrashService) {
                //Create trash 
                TrashService::create([
                    'service_id' => $service_id,
                ]);
                echo '<p style="color:green;">Service trashed successfully.</p>';
                echo '<script> setTimeout(function () { window.location.reload(); }, 3000);</script>';
            }
        }
    }

    //Function for delete parament service
    public function delete_parament_service(Request $request) {
        //Get ajax request
        $service_id = $request->service_id;
        //Delete service
        $is_parament_delete_service = Service::where('id', $service_id)->delete();
        //Check if service deleted or not not
        if ($is_parament_delete_service) {
            TrashService::where('service_id', $service_id)->delete();
            echo '<p style="color:green;">Service deleted successfully.</p>';
            echo '<script> setTimeout(function () { window.location.reload(); }, 3000);</script>';
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }
}
