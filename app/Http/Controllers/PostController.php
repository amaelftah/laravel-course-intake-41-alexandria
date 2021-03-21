<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::all(); //object of eloquent collection

        return view('posts.index', [
            'posts' => $allPosts
        ]);
    }

    public function show($postId)
    {
        $post = Post::find($postId); //object of Post model

        // $anotherSyntax = Post::where('id', $postId)->first();
        //  $anotherSyntaxForSinglePost = Post::where('title', 'Laravel')->first(); //select * from posts where title = 'Laravel' limit 1;
        // $anotherSyntaxGetAllPostsWithTitle = Post::where('title', 'Laravel')->get(); //select * from posts where title = 'Laravel';

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //logic to insert request data into db

        return redirect()->route('posts.index');
    }
}
