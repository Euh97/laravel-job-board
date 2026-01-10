<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::latest()->paginate(10); //or simple pagination

        // Pass the data to the view (not shown here)
        return view('post.index', ['posts' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', ['title' => 'Create New Post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {   
        // Validate 
        // $validated = $request->validate([
        //     'title' => 'required' ,
        //     'body' => 'required' ,
        //     'author' => 'required' ,
        // ],[
        //     'title.required' => 'Field is required',
        //     'body.required' => 'Field is required',
        //     'author.required' => 'Field is required',
        // ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->user_id = Auth::user()->id;
        $post->body = $request->input('body');
        $post->published = $request->has('published');

        $post->save();
        return redirect('blog')->with('success', 'Post created successfully');



        // print_r($request->all());
        // @TODO: This will be completed later in the forms section 
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        
        if (!$post->published) {
            return view('post.unpublished');
        }

        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // $data = Post::findOrFail($post);

        // Gate::authorize('update', $data);
        // if($data->user_id !== Auth::user()->id) {
        //     return redirect('blog')->with('error', 'Unauthorized Access');
        // }

       return view('post.edit', ['title' => 'Edit Post: '. $post->title, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, Post $post)
    {
        // $post = Post::findOrFail($post);
        
        // Gate::authorize('update', $post);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->published = $request->has('published');

        $post->save();

        return redirect('blog')->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // $post = Post::findOrFail($id);
        $post->delete();

        return redirect('blog')->with('success', 'Post Deleted successfully');
    }
}
