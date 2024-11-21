<?php

namespace App\Http\Requests\API;

use App\Enums\Course;
use App\Http\Requests\API\ApiFormRequest;
use Illuminate\Validation\Rule;

class UpdateSubjectRequest extends ApiFormRequest
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
            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('subjects')->where(function ($query) {
                    return $query->where('course', $this->input('course'));
                })->ignore($this->route('subject')->id),
            ],
            'course' => 'sometimes|required|string|in:' . implode(',', Course::values()),
        ];
    }
}
