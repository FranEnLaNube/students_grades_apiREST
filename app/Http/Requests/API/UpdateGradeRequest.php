<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\ApiFormRequest;

class UpdateGradeRequest extends ApiFormRequest
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
            'grade' => 'sometimes|required|numeric|min:0|max:10',
        ];
    }
}
