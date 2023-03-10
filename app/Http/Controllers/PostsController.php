<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{

        public function index()
    {
        $posts = Post::latest();

        return view('posts.index', [
        'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->get()
            ]);
    }

    public function show(Post $post) {

    return view('posts.show', [
        'post' => $post
    ]);
    }


}
