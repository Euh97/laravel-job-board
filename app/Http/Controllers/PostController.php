<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function index()
    {
        $data = Post::paginate(10); //or simple pagination

        // Pass the data to the view (not shown here)
        return view('post.index', ['posts' => $data]);
    }

    function show($id)
    {
        $post = Post::findOrFail($id);
        if (!$post->published) {
            return view('post.unpublished');
        }
        return view('post.show', ['post' => $post]);
    }

    function create()
    {
        // $post = Post::create([
        //     'title' => 'Post Title',
        //     'body' => 'This is the body of the new post.',
        //     'author' => 'Admin',
        //     'published' => true
        // ]);

            Post::factory(1)->create();

        return response("Succesfully created",201);
    }

    function delete($id)
    {
        Post::destroy($id);
        return response("Succesfully deleted",204);
    }
}
