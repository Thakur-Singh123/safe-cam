<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\TrashSlider;

class SliderController extends Controller
{
    //Function for add slider
    public function add_slider() {
        return view('admin.sliders.add-new-slider');
    }

    //Function for submit slider
    public function submit_slider(Request $request) {
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/sliders'), $filename);
        }
        //Create slider
        $is_slider_create = Slider::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'status' => 'Active',
            'image' => $filename,
        ]);
        //Check if slider created or not 
        if ($is_slider_create) {
            return back()->with('success', 'Slider created successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong.');
        }
    }

    //Function for all sliders
    public function all_sliders() {
        //Get sliders 
        $all_sliders = Slider::Orderby('ID', 'DESC')->where('status', 'Active')->get();
        return view('admin.sliders.all-sliders-list', compact('all_sliders'));
    }
    
    //Function for all sliders trash
    public function all_sliders_trash() {
        //Get sliders trash 
        $all_sliders_trash = Slider::where('status', ['Pending', 'Suspend', 'Approved'])->orderBy('id', 'DESC')->get();
        return view('admin.sliders.all-sliders-trash-list', compact('all_sliders_trash'));
    }

    //Function for edit slider
    public function edit_slider($id) {
        //Get slider detail
        $slider_detail = Slider::find($id);
        return view('admin.sliders.edit-slider', compact('slider_detail'));
    }

    //Function for update slider
    public function update_slider(Request $request, $id) {
        //Check if image is exit or not
        $filename = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/sliders'), $filename);
            //Update slider with image
            $is_update_slider = Slider::where('id', $id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'status' => 'Active',
                'image' => $filename,
            ]);
            //Check if slider updated or not
            if ($is_update_slider) {
                return back()->with('success', 'Slider updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong!');
            } 
        } else {
            //Update slider without image
            $is_update_slider = Slider::where('id', $id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'status' => 'Active',
            ]);
            //Check if slider updated or not
            if ($is_update_slider) {
                return back()->with('success', 'Slider updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong!');
            }
        }
    }

    //Function for delete slider trash
    public function delete_slider(Request $request) {
        //Get ajax request
        $slider_id = $request->slider_id;
        //Delete slider
        $is_delete_slider = Slider::where('id', $slider_id)->update([
            'status' => 'Pending'
        ]);    
        //Check if slider deleted or not
        if ($is_delete_slider) {
            //Create trash record
            TrashSlider::create([
                'slider_id' => $slider_id 
            ]);
            echo '<p style="color:green;">Slider detail deleted successfully.</p>';
            echo '<script> setTimeout(function () { window.location.reload(); }, 3000);</script>';
        } else {
            echo '<p style="color:red;">Opps something went wrong.</p>';
        }
    }

    //Function for delete permanet slider
    public function delete_parament_slider(Request $request) {
        //Get ajax request
        $slider_id = $request->slider_id;
        //Delete slider
        $is_slider_delete = Slider::where('id', $slider_id)->delete();
        //Check if slider deleted or not
        if ($is_slider_delete) {
            TrashSlider::where('slider_id', $slider_id)->delete();
            return back()->with('success', 'Slider deleted successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }
}
