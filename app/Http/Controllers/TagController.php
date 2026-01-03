<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
{
    function index()
    {
        $data = Tag::all();

        // Pass the data to the view (not shown here)
        return view('tag.index', ['tags' => $data, 'title' => 'Tags']);
    }

    function create()
    {
        $tag = Tag::create([
            'title' => 'CSS',
        ]);

        return redirect('/tags');
    }

    function testManyToMany()
    {
    //    $post1 = Post::find(1);
    //    $post3 = Post::find(3);

    //    $post1->tags()->attach([1, 2]);
    //    $post3->tags()->attach([1]);

    //    return response()->json([
    //     'post1_tags' => $post1->tags,
    //     'post3_tags' => $post3->tags,
    //    ]);

        $tag = Tag::find(1);
        return response()->json([
            'tag' => $tag->title,
            'posts' => $tag->posts,
        ]);
    }
}
