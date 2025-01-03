<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    public function createPost($data)
    {
      $post = new Post();
      $post->title = $data->title;
      $post->content = $data->content;
      $post->save();
      return $post;
    }

    public function getPostsWithNormalSql()
    {
      $posts = DB::select('SELECT * FROM posts');
      dd($posts);
      return $posts;
    }

    public function createPostWithNormalSql($data)
    {
      $post = DB::insert('INSERT INTO posts (user_id, title, body, created_at, updated_at) VALUES (?, ?, ?, ?, ?)', [1, $data->title, $data->body, $data->created_at, $data->updated_at]);
      return $post;
    }

    public function updatePostWithNormalSql($data)
    {
      $post = DB::update('UPDATE posts SET title = ?, body = ?, updated_at = ? WHERE id = ?',
      [$data->title, $data->body, $data->updated_at, $data->id]);
      return $post;
    }
}
