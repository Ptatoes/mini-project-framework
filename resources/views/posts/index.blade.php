@extends('layouts.app')

@section('content')
    <h1>Travel Blog Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($posts->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th> <!-- New Column -->
                    <th>Title</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            @if($post->image_url)
                                <img src="{{ $post->image_url }}" alt="Post Image" width="100" loading="lazy">
                            @else
                                <img src="{{ asset('images/default.png') }}" alt="Default Image" width="100" loading="lazy">
                            @endif
                        </td>
                        <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            @foreach($post->tags as $tag)
                                <span class="badge badge-info">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    @else
        <p>No posts available.</p>
    @endif
@endsection
