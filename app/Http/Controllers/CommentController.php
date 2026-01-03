<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class CommentController extends Controller
{
    function index()
    {
        $data = Comment::all();

        // Pass the data to the view (not shown here)
        return view('comment.index', ['comments' => $data]);
    }

    function create()
    {
        // Comment::create([
        //     'user_id' => 'Ali',
        //     'content' => 'This is a other comment.',
        //     'post_id' => 1,
        // ]);

        Comment::factory(20)->create();

        return redirect('/comments');
    }
}
