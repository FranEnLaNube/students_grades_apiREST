<?php

namespace App\Http\Requests\API;

use App\Models\Grade;
use App\Http\Requests\API\ApiFormRequest;

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
            'grade' => 'required|numeric|min:0|max:10',
        ];
    }
    /**
     * Configure the validator instance.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $studentId = $this->route('student')->id;
            $subjectId = $this->route('subject')->id;

            if (Grade::where('student_id', $studentId)
                     ->where('subject_id', $subjectId)
                     ->exists()) {
                $validator->errors()->add('grade', 'This student already has a grade for this subject.');
            }
        });
    }
}
