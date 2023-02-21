<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;


use Spatie\YamlFrontMatter\YamlFrontMatter;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    //used onece, so inline is fine
    // $files = File::files(resource_path("posts"));


//this below code is to debug logs and see how many fecthes occur
    // \Illuminate\Support\Facades\DB::listen(function($query) {
    //     logger($query->sql, $query->bindings);
    // });

    return view('posts', [
      'posts' => Post::with('category')->get()
    ]);

    // taken to Post.php
    // $posts = collect(File::files(resource_path("posts")))
    //     ->map(fn($file) => YamlFrontMatter::parseFile($file))
    //     ->map(fn($document) => new Post (
    //         $document->title,
    //         $document->slug,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body()
    //     ));

    //collection is a more neat version
    // $posts = collect(File::files(resource_path("posts")))
    //     ->map(function($file) {
    //         $document = YamlFrontMatter::parseFile($file);
    //         return new Post (
    //         $document->title,
    //         $document->slug,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body()
    //     );
    // });


    //array method

    // $posts = array_map(function($file){
    //     $document = YamlFrontMatter::parseFile($file);
    //     return new Post (
    //         $document->title,
    //         $document->slug,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body()
    //     );
    // }, $files);


    // foreach method

    // $posts = [];
    // foreach ($files as $file) {
    //     $document = YamlFrontMatter::parseFile($file);

    //     $posts[] = new Post (
    //         $document->title,
    //         $document->slug,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body()
    //     );
    // }

    // ddd($document->slug);

});




Route::get('posts/{post:slug}', function (Post $post) {

  return view('post', [
    'post' => $post
  ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});
