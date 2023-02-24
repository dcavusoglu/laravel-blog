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

    return view('posts', [
      'posts' => Post::latest()->filter(request(['search']))->get(),
      'categories' => Category::all()
    ]);
}

public function show(Post $post) {

  return view('post', [
    'post' => $post
  ]);
}


}