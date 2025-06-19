@extends('layouts.app')

@section('content')
    <h1>Todo</h1>
    <a href="{{ route('todos.index') }}" class="btn btn-dark">Back</a>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $todo->name }}</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $todo->category_id }}</h6>
            <p class="card-text">{{ $todo->description }}</p>

            <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
