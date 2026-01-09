<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comment::paginate(10);

        // Pass the data to the view (not shown here)
        return redirect('/blog');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return redirect('/blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCommentRequest $request)
    {
        $post = Post::findorFail($request->input('post_id'));

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = $request->input('user_id');
        $comment->post_id = $request->input('post_id');

        $comment->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);
        return redirect('/blog');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
