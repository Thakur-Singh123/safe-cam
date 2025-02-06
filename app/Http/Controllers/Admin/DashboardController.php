<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Function for admin dashboard
    public function dashboard() {
        return view('admin.dashboard');
    }

    //Function for submit post
    public function submit_post(Request $request) {
        $is_create_post = Post::create([
            'name' => $request->name,
            'title' => $request->title,
            'desc' => $request->desc,
        ]);
        //Check if post created or not
        if ($is_create_post) {
            return back()->with('success', 'Post created successfully');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }

    //Function for all post
    public function all_posts() {
        //Get all posts
        $all_posts = Post::orderby('ID', 'DESC')->get();
        return view('admin.posts.all-posts', compact('all_posts'));
    }

    //Function for edit post
    public function edit_post($id) {
        //Get post detail
        $post_detail = Post::find($id);
        return view('admin.posts.edit-post', compact('post_detail'));
    }

    //Function for update post
    public function update_post(Request $request, $id) {
        $is_update_post = Post::where('id', $id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'desc' => $request->desc,
        ]);
        //Check if post updated or not
        if ($is_update_post) {
            return back()->with('success', 'Post updated succes');
        }
    }
}
