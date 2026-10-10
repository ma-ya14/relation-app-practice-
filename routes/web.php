<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

// http://localhost/posts にアクセスされたら、PostController の index メソッドを実行する 🗺️
Route::get('posts', [PostController::class, 'index']);

// http://localhost/posts/1 などのアクセスを PostController の show メソッドに送る 🗺️
Route::get('/posts/{id}', [PostController::class, 'show']);