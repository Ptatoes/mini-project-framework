@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>

    @if($post->image_url)
        <div class="mb-3">
            <img src="{{ $post->image_url }}" alt="Post Image" class="img-fluid">
        </div>
    @endif

    <p><strong>Category:</strong> {{ $post->category->name }}</p>
    <p><strong>Tags:</strong>
        @foreach($post->tags as $tag)
        <a href="{{ route('tags.show', $tag) }}"> <span class="badge badge-info">{{ $tag->name }}</span></a>
        @endforeach
    </p>
    <p>{{ $post->content }}</p>

    <a href="{{  url('/') }}" class="btn btn-secondary">Back to Home</a>
    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
@endsection

