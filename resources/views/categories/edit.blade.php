@extends('layouts.app')

@section('content')
    <h1>Edit Category</h1>

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

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" placeholder="Enter Category Name">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
