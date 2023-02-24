<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostsController;

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

Route::get('/', [PostsController::class, 'index'])->name('home');




Route::get('posts/{post:slug}', [PostsController::class, 'show'] );

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [

        // helpful but more practical to add this to post model without repeating everywhere
        // 'posts' => $category->posts->load(['category', 'author'])
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()

    ]);
});


Route::get('authors/{author:username}', function (User $author) {
    // dd($author);
    return view('posts', [
        // 'posts' => $author->posts->load(['category', 'author'])
        'posts' => $author->posts,
        'categories' => Category::all()

    ]);
});
