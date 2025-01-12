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

Route::get('/user/{id}', function ($id) {
  $user = new \App\Models\User();
  return $user->getUserById($id);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts2', [PostController::class, 'index2']);

Route::get('/posts3', [PostController::class, 'indexNormalSql']);

Route::post('/posts/create/normalsql', [PostController::class, 'createPostWithNormalSql']);

Route::post('/posts/update/normalsql', [PostController::class, 'updatePostWithNormalSql']);

Route::post('/posts/delete/normalsql', [PostController::class, 'deletePostWithNormalSql']);

Route::post('/posts/create/bulk', [PostController::class, 'createBulkPostWithNormalSql']);

Route::post('/posts/create/querybuilder', [PostController::class, 'createPostWithQueryBuilder']);

Route::get('/posts/show/querybuilder', [PostController::class, 'getPostWithQueryBuilder']);

Route::post('/posts/update/querybuilder', [PostController::class, 'updatePostWithQueryBuilder']);

Route::post('/posts/delete/querybuilder', [PostController::class, 'deletePostWithQueryBuilder']);

Route::get('/posts/show/querybuilder/filter', [PostController::class, 'getPostWithQueryBuilderByFilter']);

Route::get('/posts/show/querybuilder/count', [PostController::class, 'getCountPosts']);

Route::get('/posts/show/querybuilder/join', [PostController::class, 'getPostAndUserWithQueryBuilder']);

Route::get('/posts/show/querybuilder/subquery', [PostController::class, 'getPostWithQueryBuilderBySubQuery']);

Route::get('/posts/show/eloquent', [PostController::class, 'getPostWithEloquent']);

Route::get('/posts/show/trash/eloquent', [PostController::class, 'getTrashPostWithEloquent']);

Route::get('/posts/show/eloquent/{id}', [PostController::class, 'getPostWithEloquentById']);

Route::post('/posts/create/eloquent', [PostController::class, 'createPostWithEloquent']);

Route::post('/posts/update/eloquent', [PostController::class, 'updatePostWithEloquent']);

Route::post('/posts/delete/eloquent/{id}', [PostController::class, 'deletePostWithEloquent']);
