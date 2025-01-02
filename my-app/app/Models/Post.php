<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
