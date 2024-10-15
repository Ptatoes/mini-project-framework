@extends('layouts.app')

@section('content')
    <h1>Tag: {{ $tag->name }}</h1>

    <h3>Posts associated with this tag:</h3>
    @if($posts->count())
        <ul>
            @foreach($posts as $post)
                <li><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>

        {{ $posts->links() }}
    @else
        <p>No posts associated with this tag.</p>
    @endif

    <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back to Tags</a>
@endsection
