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

    public function deletePostWithNormalSql($id)
    {
      $post = DB::delete('DELETE FROM posts WHERE id = ?', [$id]);
      return $post;
    }

    public function createBulkPostWithNormalSql()
    {
      DB::transaction(function(){
        $user_id = 1;
        $title = "first post test";
        $body = "first post body test";
        DB::insert('INSERT INTO posts (user_id, title, body, created_at, updated_at) VALUES (?, ?, ?, now(), now())', [$user_id, $title, $body]);
  
        // テストで失敗する処理 user_idを除いてみる
        $user_id = null;
        $title = "second post test";
        $body = "second post body test";
        DB::insert('INSERT INTO posts (user_id, title, body, created_at, updated_at) VALUES (?, ?, ?, now(), now())', [$user_id, $title, $body]);
      });
    }

    public function createPostWithQueryBuilder($data)
    {
      $post = DB::table('posts')->insert([
        'user_id' => $data->user_id,
        'title' => $data->title,
        'body' => $data->body,
        'created_at' => $data->created_at,
        'updated_at' => $data->updated_at
      ]);
      return $post;
    }

    public function getPostWithQueryBuilder()
    {
      $posts = DB::table('posts')->get();
      dd($posts);
      return $posts;
    }

    public function updatePostWithQueryBuilder($data)
    {
      $post = DB::table('posts')->where('id', $data->id)->update([
        'title' => $data->title,
        'body' => $data->body,
        'updated_at' => now()
      ]);
      return $post;
    }

    public function deletePostWithQueryBuilder($id)
    {
      $post = DB::table('posts')->where('id', $id)->delete();
      return $post;
    }

    public function getPostByFilter()
    {
      // $posts = DB::table('posts')
      // ->where('title', 'like', '%内容%')
      // ->whereIn('id', [1, 2, 3])
      // ->get();
      // return $posts;

      $posts = DB::table('posts')->paginate(5);
      return $posts;
    }

    public function countPosts()
    {
      $count = DB::table('posts')->count();
      return $count;
    }

    public function getPostAndUserWithQueryBuilder()
    {
      $posts = DB::table('posts')
      ->join('users', 'posts.user_id', '=', 'users.id')
      ->select('posts.*', 'users.name as user_name')
      ->get();
      return $posts;
    }

    public function getPostWithQueryBuilderBySubQuery()
    {
      $posts = DB::table('posts')
      ->whereIn('id', function ($query) {
          $query->select(DB::raw('MAX(id)'))
              ->from('posts')
              ->groupBy('user_id');
      })
        ->toSql();
        dd($posts);
      return $posts;
    }

    public function getPostWithEloquent()
    {
      $posts = Post::all();
      dd($posts);
      return $posts;
    }

    public function getPostWithEloquentById($id)
    {
      $post = Post::find($id);
      // dd($post);
      return $post;
    }

    public function createPostWithEloquent($data)
    {
      $post = new Post();
      $post->user_id = $data->user_id;
      $post->title = $data->title;
      $post->body = $data->body;
      $post->save();
      return $post;
    }

    public function updatePostWithEloquent($data)
    {
      $post = Post::find($data->id);
      $post->title = $data->title;
      $post->body = $data->body;
      $post->save();
      return $post;
    }

    public function deletePostWithEloquent($id)
    {
      $post = Post::find($id);
      $post->delete();
      return $post;
    }
}
