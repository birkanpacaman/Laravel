<?php

namespace App\Http\Requests;

use App\Enums\TodoPriorityEnum;
use App\Enums\TodoStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'status' => ['required', Rule::enum(TodoStatusEnum::class)],
            'priority' => ['required', Rule::enum(TodoPriorityEnum::class)],
            'due_date' => ['nullable', 'date'],
            'completed_date' => ['nullable', 'date'],
            'is_starred' => ['sometimes'],
        ];
    }
}
