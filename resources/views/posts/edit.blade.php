@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Existing Fields -->

        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" placeholder="Enter Title">
        </div>

        <div class="form-group">
            <label>Content:</label>
            <textarea name="content" class="form-control" rows="5" placeholder="Enter Content">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="form-group">
            <label>Category:</label>
            <select name="category_id" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $post->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Tags:</label>
            <select name="tags[]" class="form-control" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ (in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</small>
        </div>

        <!-- Display Current Image -->
        <div class="form-group">
            <label>Current Image:</label><br>
            @if($post->image_url)
                <img src="{{ $post->image_url }}" alt="Post Image" width="200">
            @else
                <p>No image URL provided.</p>
            @endif
        </div>

        <!-- New Image URL Field -->
        <div class="form-group">
            <label>Change Image URL:</label>
            <input type="url" name="image_url" class="form-control" placeholder="Enter Image URL" value="{{ old('image_url', $post->image_url) }}">
            <small class="form-text text-muted">Optional. Please provide a valid image URL (e.g., https://example.com/image.jpg).</small>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
