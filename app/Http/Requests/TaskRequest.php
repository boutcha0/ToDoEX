<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Authorization is handled in the controller
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
public function rules(): array
{
    $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'nullable|in:pending,completed',
    ];

    if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
        $rules['title'] = 'sometimes|required|string|max:255';
    }

    return $rules;
}

    /**
     * Get custom error messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Task title is required',
            'title.max' => 'Task title cannot exceed 255 characters',
            'description.max' => 'Task description cannot exceed 1000 characters',
            'status.in' => 'Status must be one of: pending, in_progress, completed',
            'priority.in' => 'Priority must be one of: low, medium, high',
            'due_date.after' => 'Due date must be in the future',
        ];
    }
}