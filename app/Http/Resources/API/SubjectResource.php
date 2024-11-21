<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use App\Http\Resources\API\GradeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'course' => $this->course,
            'grades' => GradeResource::collection($this->whenLoaded('grades')),
        ];
    }
}
