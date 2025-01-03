@extends('layouts.app')

@section('title', '投稿一覧')

@section('content')
<x-alert type="warning">
  これは警告メッセージです
</x-alert>
<h1 class="text-center">Index2 Title</h1>
  @foreach ($posts as $post)
    <div>
      <h2 class="text-center">{{ $post->title }}</h2>
      <p class="text-center">{{ $post->body }}</p>
    </div>
  @endforeach
@endsection
