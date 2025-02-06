<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //Function for default page
    public function index() {
        //Get auth detail
        $user = Auth::user();
        //Check if user type super admin or not
        if ($user->user_type == 'SuperAdmin') {
            return redirect('super-admin-dashboard');
        } elseif ($user->user_type == 'Admin') {
            return redirect('admin/all-sliders-list');
        } elseif ($user->user_type == 'Customer') {
            return redirect('customer-dashboard');
        } else {
           return view('home');
        }
    }
}
