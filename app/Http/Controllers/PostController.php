<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
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
        return view('posts.create',[
            'users' => User::all()
        ]);
    }

    public function store(StorePostRequest $request) // == calling request()
    {
        // $requestData = request()->all();

        //another syntax
        // $title = request()->title;
        // $description = request()->description;

        $requestData = $request->all();

        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        // ]);

        Post::create($requestData);

        //another syntax
        // $post = new Post;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();

        return redirect()->route('posts.index');
    }
}
