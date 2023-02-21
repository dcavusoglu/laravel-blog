<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

    return view('posts', [
      'posts' => Post::all()
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




Route::get('posts/{post}', function ($slug) {

  return view('post', [
    'post' => Post::find($slug)
  ]);
})->where('post', '[A-z_\-]+');
