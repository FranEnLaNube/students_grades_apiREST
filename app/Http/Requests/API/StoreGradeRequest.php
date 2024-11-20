<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\ApiFormRequest;
use Illuminate\Validation\Rule;

class StoreGradeRequest extends ApiFormRequest
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
            'student_id' => 'required|uuid|exists:students,id',
            'subject_id' => [
                'required',
                'uuid',
                'exists:subjects,id',
                Rule::unique('grades')->where(function ($query) {
                    return $query->where('student_id', $this->input('student_id'));
                }),
            ],
            'grade' => 'required|integer|min:0|max:10',
        ];
    }
}
