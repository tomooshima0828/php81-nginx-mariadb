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

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts2', [PostController::class, 'index2']);

Route::get('/posts3', [PostController::class, 'indexNormalSql']);

Route::post('/posts/create/normalsql', [PostController::class, 'createPostWithNormalSql']);

Route::post('/posts/update/normalsql', [PostController::class, 'updatePostWithNormalSql']);
