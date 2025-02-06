<?php

// app/Http/Controllers/Auth/CustomPasswordResetController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;

class CustomPasswordResetController extends Controller
{
    // Show the form to request a password reset link
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Send the password reset link to the user's email
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'We can\'t find a user with that email address.']);
        }
    
        $token = Str::random(60);
    
        // Store the token in the password_resets table
        \DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $token, 'created_at' => now()]
        );
    
        // Log the email content to check if it's getting sent
        \Log::info('Sending password reset email to: ' . $user->email);
    
        // Send the reset link via email
        try {
            Mail::to($user->email)->send(new PasswordResetMail($token));
            \Log::info('Password reset email sent successfully.');
        } catch (\Exception $e) {
            \Log::error('Error sending email: ' . $e->getMessage());
        }
    
        return back()->with('status', 'We have emailed your password reset link!');
    }
    

    // Show the form to reset the password
    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    // Reset the user's password
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $reset = \DB::table('password_resets')->where('token', $request->token)->first();

        if (!$reset || $reset->email !== $request->email) {
            return back()->withErrors(['email' => 'Invalid token or email address.']);
        }
        
        $expires = now()->subMinutes(60); 
        if ($reset->created_at < $expires) {
            return back()->withErrors(['email' => 'This password reset link has expired.']);
        }
        
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the reset token
        \DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', 'Your password has been reset!');
    }
}
