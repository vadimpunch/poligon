<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function() {
   Route::resource('posts', 'PostController')->names('blog.posts');
});

//Route::resource('rest', 'RestTestController')->names('restTest');

Route::group(['namespace' => 'Blog\Admin', 'prefix' => 'admin/blog'], function() {
    $methods = ['index', 'update', 'edit', 'store', 'create'];
    Route::resource('categories', 'CategoryController')
            ->only($methods)
            ->names('blog.admin.categories');

    Route::resource('posts', 'PostController')
        ->except('show')
        ->names('blog.admin.post');

    Route::get('/posts/{post}/restore', 'PostController@restore')->name('blog.admin.post.restore');
});