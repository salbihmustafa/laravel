<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostsController;

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

Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/single', AboutController::class);

//first parameter is route name
Route::resource('posts', PostsController::class)->only(['index', 'show', 'create', 'store']);

Route::get('/recent-posts/{days_ago?}', function ($daysAgo = 20) {
    return "Posts from " . $daysAgo . " days ago";
})->name('posts.recent.index')->middleware('auth');

//Route::prefix('/fun')->name('fun.')->group(function () use ($posts) {
//    Route::get('/responses', function () use ($posts) {
//        return response($posts, 201)->header('Content-Type', 'application/json')->cookie('MY_COOKIE', 'Salbih Mustafa', 3600);
//    })->name('responses');
//
//    Route::get('/redirect', function () {
//        return redirect('/contact');
//    })->name('redirect');
//
//    Route::get('/back', function () {
//        return back();
//    })->name('back');
//
//    Route::get('/named-route', function () {
//        return redirect()->route('posts.show', ['id' => 1]);
//    })->name('named-route');
//
//    Route::get('/away', function () {
//        return redirect()->away('https://google.com');
//    })->name('away');
//
//    Route::get('/json', function () use ($posts) {
//        return response()->json($posts);
//    })->name('json');
//
//    Route::get('/download', function () {
//        return response()->download(public_path('/daniel.jpg'), 'face.jpg');
//    })->name('download');
//});




