<?php

namespace App\Http\Controllers\API;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\GradeResource;
use App\Http\Requests\API\StoreGradeRequest;
use App\Http\Requests\API\UpdateGradeRequest;

class StudentGradesController extends Controller
{
    public function index(Student $student): JsonResponse
    {
        $grades = $student->grades()->with('subject')->get();
        return response()->json(GradeResource::collection($grades), 200);
    }

    public function store(Student $student, Subject $subject, StoreGradeRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['student_id'] = $student->id;
        $data['subject_id'] = $subject->id;

        $grade = Grade::create($data);
        return response()->json(new GradeResource($grade), 201);
    }

    public function show(Student $student, Subject $subject): JsonResponse
    {
        $grade = Grade::where('student_id', $student->id)
            ->where('subject_id', $subject->id)
            ->firstOrFail();

        return response()->json(new GradeResource($grade), 200);
    }

    public function update(UpdateGradeRequest $request, Student $student, Subject $subject): JsonResponse
    {
        $grade = Grade::where('student_id', $student->id)
            ->where('subject_id', $subject->id)
            ->firstOrFail();

        $grade->update($request->validated());
        return response()->json(new GradeResource($grade), 200);
    }

    public function destroy(Student $student, Subject $subject)
    {
        $grade = Grade::where('student_id', $student->id)
            ->where('subject_id', $subject->id)
            ->firstOrFail();

        $grade->delete();
        return response()->noContent();
    }
}
