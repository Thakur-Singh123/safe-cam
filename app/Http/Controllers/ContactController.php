<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //Function for submit contact form
    public function submit_contact_us(Request $request) {
        //Get email
        $is_existing_email = ContactUs::where('email', $request['email'])->exists();

        //Check email exists or not
        if ($is_existing_email) {
            echo '<p style="color:red;">This email already used, please try new email.</p>';
        } else {
            //Create contact
            $MailData = ContactUs::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'subject' => $request['subject'],
                'message' => $request['message'],
            ]);

            //Send email
            Mail::to(['kapoorthakur906@gmail.com', $request['email']])->send(new ContactFormMail($MailData));
            //Check if email is created or not

            if ($MailData) {
                echo '<p style="color:green;">Thank you for contacting us. We will get back to you shortly.</p>';
                echo '<script> setTimeout(function () { window.location.reload(); }, 1000);</script>';
            } else {
                echo '<p style="color:red;">Oops! Something went wrong. Please try again later.</p>';     
            }
        }
    }
}

