<?php

namespace App\Http\Requests;

use App\Enums\TodoPriorityEnum;
use App\Enums\TodoStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTodoRequest extends FormRequest
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

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title field must be a string.',
            'title.max' => 'The title field must be less than 255 characters.',
            'description.string' => 'The description field must be a string.',
            'category_id.exists' => 'The selected category is invalid.',
            'status.required' => 'The status field is required.',
            'status.enum' => 'The status field must be a valid status.',
            'priority.required' => 'The priority field is required.',
            'priority.enum' => 'The priority field must be a valid priority.',
            'due_date.date' => 'The due date field must be a valid date.',
            'completed_date.date' => 'The completed date field must be a valid date.',
            'is_starred.required' => 'The is starred field is required.',
            'is_starred.boolean' => 'The is starred field must be a boolean.'
        ];
    }
}
