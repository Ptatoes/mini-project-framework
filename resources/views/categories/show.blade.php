@extends('layouts.app')

@section('content')
    <h1>Category: {{ $category->name }}</h1>

    <h3>Posts under this category:</h3>
    @if($posts->count())
        <ul>
            @foreach($posts as $post)
                <li><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>

        {{ $posts->links() }}
    @else
        <p>No posts in this category.</p>
    @endif

    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
@endsection
