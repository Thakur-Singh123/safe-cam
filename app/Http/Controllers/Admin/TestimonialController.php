<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;
use App\Models\TrashTestimonial;

class TestimonialController extends Controller
{
    //Function for add testimonial
    public function add_testimonial() {
        return view('admin.testimonials.add-new-testimonial');
    }

    //Function for submit testimonial
    public function submit_testimonial(Request $request) {
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/testimonials'), $filename);
        }
        //Create testimonial
        $is_create_testimonial = Testimonial::create([
            'name' => $request->name,
            'title' => $request->title,
            'desc' => $request->desc,
            'status' => 'Active',
            'image' => $filename,
        ]);
        //Create testimonial 
        if ($is_create_testimonial) {
            return back()->with('success', 'Testimonial created successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong.');
        }
    }

    //Function for all testimonials
    public function all_testimonials() {
        //Get testimonials
        $all_testimonials = Testimonial::Orderby('ID','DESC')->where('status', 'Active')->get();
        return view('admin.testimonials.all-testimonials', compact('all_testimonials'));
    }

    //Function for all trash testimonials
    public function all_testimonials_trash() {
        //Get testimonials
        $all_trash_testimonial = Testimonial::where('status', ['Pending', 'Suspend', 'Approved'])->orderBy('id', 'DESC')->get();
        return view('admin.testimonials.all-testimonials-trash-list', compact('all_trash_testimonial'));
    } 

    //Function for edit testimonial
    public function edit_testimonial($id) {
        //Get testimonial detail
        $testimonial_detail = Testimonial::find($id);
        return view('admin.testimonials.edit-testimonial', compact('testimonial_detail'));
    }

    //Function for update testimonial
    public function update_testimonial(Request $request, $id) {
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/testimonials'), $filename);
            //Update testimonial with image
            $is_update_testimonial = Testimonial::where('id', $id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'desc' => $request->desc,
                'status' => 'Active',
                'image' => $filename,
            ]);
            //Check if testimonial created or not
            if ($is_update_testimonial) {
                return back()->with('success', 'Testimonial updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong!');
            }
        } else {
            //Update testimonial without image
            $is_update_testimonial = Testimonial::where('id', $id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'desc' => $request->desc,
                'status' => 'Active',
            ]);
            //Check if testimonial created or not
            if ($is_update_testimonial) {
                return back()->with('success', 'Testimonial updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong!');
            }
        }
    }

    //Function for trash testimonial
    public function trash_testimonial(Request $request) {
        //Get ajax request 
        $testimonial_id = $request->testimonial_id;
        //Trash testimonial
        $trash_testimonial = Testimonial::where('id', $testimonial_id)->update([
            'status' => 'Pending'
        ]);
        //Check if testimonial trashed or not
        if ($trash_testimonial) {
            //Check if testimonial exists or not
            $existingTrashService = TrashTestimonial::where('testimonial_id', $testimonial_id)->exists();
            if (!$existingTrashService) {
            //Create testimonial
            TrashTestimonial::create([
                'testimonial_id' => $testimonial_id,
            ]);
                echo '<p style="color:green;">Testimonial trashed successfully.</p>';
                echo '<script> setTimeout(function () { window.location.reload(); }, 3000);</script>';
            } else {
                echo '<p style="color:red;">Opps something went wrong.</p>';
            }
        }
    }

    //Function for delete testimonial
    public function delete_parament_testimonial(Request $request) {
        //Get ajax request
        $testimonial_id = $request->testimonial_id;
        //Delete testimonial
        $is_delete_testimonial = Testimonial::where('testimonial_id', $testimonial_id)->delete();
        //Check if testimonial deleted or not
        if ($is_delete_testimonia) {
            //Delete trash record
            TrashTestimonial::where('testimonial_id', $testimonial_id)->delete();
            echo '<p style="color:green;">Testimonial deleted successfully.</p>';
            echo '<script> setTimeout(function () { window.location.reload(); }, 3000);</script>';
        } else {
            echo '<p style="color:red;">Opps something went wrong.</p>';
        }
    }
}
