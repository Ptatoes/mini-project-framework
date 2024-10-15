@extends('layouts.app')

@section('content')
    <h1>Edit Tag</h1>

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

    <form action="{{ route('tags.update', $tag) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $tag->name) }}" placeholder="Enter Tag Name">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
