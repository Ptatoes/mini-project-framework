@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p><strong>Category:</strong> {{ $post->category->name }}</p>
    <p><strong>Tags:</strong>
        @foreach($post->tags as $tag)
            <span class="badge badge-info">{{ $tag->name }}</span>
        @endforeach
    </p>
    <p>{{ $post->content }}</p>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
@endsection
