<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    
    public function index()
    {
        // show all blog posts
        // $posts = BlogPost::all(); //fetch all blog posts from DBm
	    // return $posts; //returns the fetched posts
        $posts = BlogPost::all(); //fetch all blog posts from DB

        return view('blog.index', [
            'posts' => $posts,
        ]); //returns the view with posts
    }

    public function create()
    {
        //show form to create a blog post
        return view('blog.create');
    }

   
    public function store(Request $request)
    {
        //store a new post
        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => 1
        ]);

        return redirect('blog/' . $newPost->id);
    }

    public function show(BlogPost $blogPost)
    {
        //show a blog post
        //returns the fetched posts
        return view('blog.show', [
            'post' => $blogPost,
        ]); //returns the view with the post
    }

    
    public function edit(BlogPost $blogPost)
    {
        //where('user_id', auth()->user()->id)->get()
        if($blogPost->user_id == auth()->user()->id){
            return view('blog.edit', [
                'post' => $blogPost,
                ]); //returns the edit view with the post
        }
    }

    
    public function update(Request $request, BlogPost $blogPost)
    {
        //cuma boleh update dia punya blog sahaja
        //update post
        if($blogPost->user_id == auth()->user()->id){
            $blogPost->update([
                'title' => $request->title,
                'body' => $request->body
            ]);
        }

        return redirect('blog/' . $blogPost->id);
    }

    
    public function destroy(BlogPost $blogPost)
    {
        //cuma boleh delete dia punya blog sahaja
        //delete post
        if($blogPost->user_id == auth()->user()->id){
            $blogPost->delete();
        }

        return redirect('/blog');
    }
}
