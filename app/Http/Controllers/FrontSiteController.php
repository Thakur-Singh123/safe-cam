<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Service;
use App\Models\Testimonial;

class FrontSiteController extends Controller
{
    //Function for front page site
    public function front_page() {
        //Get sliders details
        $all_sliders = Slider::OrderBy('ID', 'DESC')->where('status', 'Active')->get();
        //Get services details
        $all_services = Service::OrderBy('ID', 'DESC')->get();
        //Get testimonials details
        $all_testimonials = Testimonial::OrderBy('ID', 'DESC')->get();
        return view('front-page', compact('all_sliders','all_services','all_testimonials'));
    }

    //Function for about
    public function about() {
        return view('about');
    }

    //Function for blog
    public function blog() {
        return view('blog');
    }

    //Function for blog detail
    public function blog_detail() {
        return view('blog-detail');
    }

    //Function for contact
    public function contact() {
        return view('contact');
    }

    //Function for price
    public function price() {
        return view('price');
    }

    //Function for service
    public function service() {
        return view('service');
    }

    //Function for team
    public function team() {
        return view('team');
    }

    //Function for testimonial
    public function testimonial() {
        //Get testimonials
        $all_testimonials = Testimonial::Orderby('ID', 'DESC')->where('status', 'Active')->get();
        return view('testimonial', compact('all_testimonials'));
    }
}
