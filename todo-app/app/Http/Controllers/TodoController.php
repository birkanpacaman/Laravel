<?php

namespace App\Http\Controllers;

use App\Enums\TodoPriorityEnum;
use App\Enums\TodoStatusEnum;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Todo::query();

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $todos = $query->paginate(10);
        return view('pages.todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $statuses = TodoStatusEnum::cases();
        $priorities = TodoPriorityEnum::cases();
        return view(
            'pages.todos.create',
            compact('categories', 'statuses', 'priorities')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = 1; //auth()->user()->id;
        $validatedData['is_starred'] = isset($validatedData['is_starred']) ? true : false;
        Todo::create($validatedData);
        return redirect()->back()->with('success', 'Todo created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo): View
    {
        return view('pages.todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo): View
    {
        $categories = Category::all();
        $statuses = TodoStatusEnum::cases();
        $priorities = TodoPriorityEnum::cases();
        return view(
            'pages.todos.edit',
            compact('todo', 'categories', 'statuses', 'priorities')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['is_starred'] = isset($validatedData['is_starred']) ? true : false;
        $todo->update($validatedData);
        return redirect()->back()->with('success', 'Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo): RedirectResponse
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }

    /**
     * check the todo status
     */
    public function check(Request $request, Todo $todo): RedirectResponse
    {
        $check = $request->input('check');
        if ($check) {
            $todo->update(
                [
                    'completed_date' => now(),
                    'status' => TodoStatusEnum::COMPLETED->value
                ]
            );
        } else {
            $todo->update(
                [
                    'completed_date' => null,
                    'status' => TodoStatusEnum::PENDING->value
                ]
            );
        }
        return redirect()->back()->with('success', 'Todo status updated successfully');
    }
}
