@extends('layouts.app')

@section('content')
    <h1>All Posts</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($posts->count())
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        @if($post->image_url)
                            <img src="{{ $post->image_url }}" class="card-img-top" alt="{{ $post->title }}" loading="lazy">
                        @else
                            <img src="{{ asset('images/default.png') }}" class="card-img-top" alt="Default Image" loading="lazy">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                Category: <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
                                | Tags:
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('tags.show', $tag) }}"><span class="badge badge-info">{{ $tag->name }}</span></a>
                                @endforeach
                            </small>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary btn-sm float-right">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $posts->links() }}
    @else
        <p>No posts available.</p>
    @endif
@endsection
