<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class ProfileController extends Controller
{
    //Function for user profile
    public function edit_profile() {
    //Get auth login id
    $is_login_id = Auth::user()->id;
    // echo "<pre>"; print_r($is_login_id);exit;
    $user_profile = User::where('id', $is_login_id)->first();
        return view('admin.profiles.edit-profile', compact('user_profile'));
    } 

    //Function for update profile
    public function update_profile(Request $request, $id){
        //Check if image is exit or not
        $filename ="default_user.png";
        if($request->hasFile('admin_profile_pic')) {
            //Get user detail
            $user_detail = User::find($id);    
            //Get image path
            $imagePath = public_path('uploads/users/' . $user_detail->avatar);
            //Delete image file
            if(file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }
            //Get request image
            $file = $request->file('admin_profile_pic');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads/users'), $filename);
            //Update profile record with image
            $update_profile = User::where('id', $id)->update([
                'name' =>$request->name,
                'address' =>$request->address,
                'mobile' =>$request->mobile,
                'gender' =>$request->gender,
                'avatar' =>$filename,
            ]);
            //Check if Profile updated or not
            if($update_profile){
                return back()->with('success', 'Profile updated successfully.');
            } else {
                return back()->with('unsucess', 'someting went wrong.');
            }        
        } else {
               //Update profile record without image
               $update_profile = User::where('id', $id)->update([
                'name' =>$request->name,
                'address' =>$request->address,
                'mobile' =>$request->mobile,
                'gender' =>$request->gender,
            ]);
            //Check if Profile updated or not
            if($update_profile){
                return back()->with('success', 'Profile updated successfully.');
            } else {
                return back()->with('unsucess', 'someting went wrong.');
            } 
        }
    }

    //Function for change password
    public function change_password(){
    //Get auth login id
    $is_login_id = Auth::user()->id;
    $user_profile = User::where('id', $is_login_id)->first();
        return view('admin.profiles.change-password', compact('user_profile'));
    }

    //Function for submit change password 
    public function submit_change_password(Request $request){    
        //Check the current password
        $user = Auth::user();
        if(!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('unsuccess', 'Your current password does not match with the password you provided.');
        }
            //Check if the new password matches the confirmation password
            if ($request->password !== $request->confirm_password) {
                return redirect()->back()->with('unsuccess', 'New password and confirm password do not match.');
            }   
        //Update the password
        $user->password = Hash::make($request->password);
        $user->save();   
        return redirect()->back()->with('success', 'Your password has been changed successfully.');
    }

      // Function for reset password form
      public function reset_password_form(){
        return view('admin.profiles.reset-password');
    }

    // Function for reset password
    public function reset_password(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);
        
        $user = User::where('email', $request->email)->first();

        // Reset password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Your password has been reset successfully.');
    }
}
