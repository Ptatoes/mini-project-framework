@extends('layouts.app')

@section('content')
    <h1>Create New Tag</h1>

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

    <form action="{{ route('tags.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Tag Name" value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
