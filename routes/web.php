<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
//    return view('welcome');
    return redirect()->route('apartments.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/*----- Old -----*/
Route::get('/hello', [\App\Http\Controllers\HelloController::class, "index"]);

//Route::get('/hello/array', function () {
//    return ["Apple","Banana","Coconut"];
//});

Route::get('/hello/array', [\App\Http\Controllers\HelloController::class, "array"])
    ->name('hello.array');

Route::get('/posts/{id?}', [\App\Http\Controllers\HelloController::class, "posts"]);

Route::get('/about', [\App\Http\Controllers\HelloController::class, "about"]);

Route::get('/apartments/{apartment}/rooms/create', [\App\Http\Controllers\ApartmentController::class, "createRoom"])
    ->name('apartment.rooms.create');

Route::resource('apartments', \App\Http\Controllers\ApartmentController::class);
Route::resource('rooms', \App\Http\Controllers\RoomController::class);
Route::resource('tasks', \App\Http\Controllers\TaskController::class)
    ->middleware('auth');
Route::resource('tags', \App\Http\Controllers\TagController::class);
Route::get('tag/{slug}', [\App\Http\Controllers\TagController::class, 'showBySlug'])
    ->name('tags.slug');

Route::resource('images',\App\Http\Controllers\ImageController::class);

Route::get('/google/redirect', [\App\Http\Controllers\GoogleAuthController::class,'redirect'])
->name('google.redirect');
Route::get('/google/callback', [\App\Http\Controllers\GoogleAuthController::class,'callback']);

