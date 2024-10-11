@extends('layouts.app')

@section('content')
    <h1>Create New Post</h1>

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

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label>Content:</label>
            <textarea name="content" class="form-control" rows="5" placeholder="Enter Content">{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label>Category:</label>
            <select name="category_id" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Tags:</label>
            <select name="tags[]" class="form-control" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ (collect(old('tags'))->contains($tag->id)) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
