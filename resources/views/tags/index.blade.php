@extends('layouts.app')

@section('content')
    <h1>Tags</h1>
    <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Create New Tag</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($tags->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td><a href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a></td>
                        <td>
                            <a href="{{ route('tags.edit', $tag) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tags available.</p>
    @endif
@endsection
