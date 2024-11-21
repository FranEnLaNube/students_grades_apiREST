<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use App\Http\Resources\API\StudentResource;
use App\Http\Resources\API\SubjectResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GradeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'grade' => $this->grade,
            'subject' => new SubjectResource($this->whenLoaded('subject')),
            'student' => new StudentResource($this->whenLoaded('student')),
        ];
    }
}
