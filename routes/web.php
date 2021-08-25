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
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello Laravel";
});

Route::get('/hello/array', function () {
    return ["Apple","Banana","Coconut"];
});

Route::get('/hello/array2', function () {
    return [
        'key'=> 'value',
        'message' => 'Hello Laravel',
        'success' => true,
        'error' => false,
    ];
})->name('hello.array2');
//////////////////////////////////////////////////////
Route::get('/posts/{id?}', function ($id = null) {
    if ($id === null)
        return view('posts.index');
    return "Post ID: " .$id;
});

Route::get('/about', function () {
    return view('about',[
        'name' => 'Your Name',
        'info' => [
            'address' => '<b>Kasetsart</b> University',
            'email' => 'contact@ku.th'
        ]
    ]);
});
