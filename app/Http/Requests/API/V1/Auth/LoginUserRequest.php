<?php

namespace App\Http\Requests\API\V1\Task;

use App\Enums\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTaskRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            "title" => ['required', 'string'],
            "description" => ['nullable', 'string'],
            "status" => ['required', Rule::in(TaskStatusEnum::values()) ]
        ];
    }
}
