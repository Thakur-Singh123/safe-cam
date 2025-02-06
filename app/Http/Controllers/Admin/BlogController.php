<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //Function for add blog
    public function add_blog() {
        return view('admin.blogs.add-new-blog');
    }

    //Function for submit blog
    public function submit_blog(Request $request) {
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/blogs'), $filename);
        }
        //Create blog
        $is_create_blog = Blog::create([
            'name' => $request->name,
            'title' => $request->title,
            'desc' => $request->desc,
            'date' => $request->date,
            'status' => 'Active',
            'image' => $filename,
        ]);
        //Check if blog created or not
        if ($is_create_blog) {
            return back()->with('success', 'Blog created successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong.');
        }
    }

    //Function for all blogs
    public function all_blogs() {
        //Get blogs detail
        $all_blogs = Blog::Orderby('ID', 'DESC')->where('status', 'Active')->get();
        return view('admin.blogs.all-blogs', compact('all_blogs'));
    }

    //Function for edit blog
    public function edit_blog($id) {
        //Get blog detail
        $blog_detail = Blog::find($id);
        return view('admin.blogs.edit-blog', compact('blog_detail'));
    }
}
