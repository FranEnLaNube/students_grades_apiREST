<?php

namespace App\Http\Requests\API;

use App\Enums\Course;
use Illuminate\Validation\Rule;
use App\Http\Requests\API\ApiFormRequest;

class StoreSubjectRequest extends ApiFormRequest
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
                'required',
                'string',
                'max:255',
                Rule::unique('subjects')->where(function ($query) {
                    return $query->where('course', $this->course);
                }),
            ],
            'course' => 'required|string|in:' . implode(',', Course::values()),
        ];
    }
}
