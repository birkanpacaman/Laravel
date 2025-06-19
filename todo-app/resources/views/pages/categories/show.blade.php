@extends('layouts.app')

@section('content')
    <h1>Category</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-dark">Back</a>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $category->color }}</h6>
            <p class="card-text">{{ $category->description }}</p>

            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
