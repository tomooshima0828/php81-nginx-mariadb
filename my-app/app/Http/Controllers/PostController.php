<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $posts = [
        (object)['title' => 'first post', 'body' => 'first post body'],
        (object)['title' => 'second post', 'body' => 'second post body'],
        (object)['title' => 'third post', 'body' => 'third post body']
      ];
      return view('posts.index', ['posts' => $posts]);
    }

    public function index2()
    {
      $posts = [
        (object)['title' => 'first post', 'body' => 'first post body'],
        (object)['title' => 'second post', 'body' => 'second post body'],
        (object)['title' => 'third post', 'body' => 'third post body']
      ];
      return view('posts.index2', ['posts' => $posts]);
    }

    public function indexNormalSql()
    {
      $post = new Post();
      $posts = $post->getPostsWithNormalSql();
      return $posts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function createPostWithNormalSql()
    {
      $dummyData = (object)[
        'user_id' => 1,
        'title' => 'test title aaa',
        'body' => 'test body aaa',
        'created_at' => now(),
        'updated_at' => now()
      ];
      
      $post = new Post();
      $post->createPostWithNormalSql($dummyData);
    }

    public function updatePostWithNormalSql()
    {
      $dummyData = (object)[
        'title' => 'test title ccc',
        'body' => 'test body ccc',
        'updated_at' => now(),
        'id' => 15
      ];
      
      $post = new Post();
      $post->updatePostWithNormalSql($dummyData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'caption' => 'nullable'
      ]);
      $path = $request->file('image')->store('public');
      Post::createPost($request->all());
      return response()->json([
        'success' => true,
        'path' => $path,
        'message' => 'Image uploaded successfully'
      ]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
