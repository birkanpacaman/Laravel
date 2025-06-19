@extends('layouts.app')

@section('content')
    <h1>Todos</h1>
    <a href="{{ route('todos.create') }}" class="btn btn-primary">Add Todo</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Priority</th>
                <th scope="col">Due Date</th>
                <th scope="col">Completed Date</th>
                <th scope="col">Is Starred</th>
                <th scope="col">Check</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <th scope="row">{{ $todo->id }}</th>
                    <td><a href="{{ route('todos.show', $todo->id) }}">{{ $todo->title }}</a></td>
                    <td>{{ $todo->category->name ?? 'No category' }}</td>
                    <td>{{ \App\Enums\TodoStatusEnum::from($todo->status)->label() }}</td>
                    <td>{{ \App\Enums\TodoPriorityEnum::from($todo->priority)->label() }}</td>
                    <td>{{ $todo->due_date }}</td>
                    <td>{{ $todo->completed_date }}</td>
                    <td>{{ $todo->is_starred }}</td>
                    <td>
                        <form action="{{ route('todos.check', $todo->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" name="check" value="1" {{ $todo->status == 'completed' ? 'checked' : '' }} onchange="this.form.submit()">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $todos->appends(request()->query())->links('pagination::bootstrap-5') }}
@endsection
