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

class SubjectGradesController extends Controller
{
    public function index(Subject $subject): JsonResponse
    {
        $grades = $subject->grades()->with('student')->get();

        return response()->json(GradeResource::collection($grades), 200);
    }
    public function store(Subject $subject, Student $student, StoreGradeRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['student_id'] = $student->id;
        $data['subject_id'] = $subject->id;

        $grade = Grade::create($data);

        return response()->json(new GradeResource($grade), 201);
    }
    public function show(Subject $subject, Student $student): JsonResponse
    {
        $grade = Grade::where('subject_id', $subject->id)
            ->where('student_id', $student->id)
            ->firstOrFail();

        return response()->json(new GradeResource($grade), 200);
    }
    public function update(UpdateGradeRequest $request, Subject $subject, Student $student): JsonResponse
    {
        $grade = Grade::where('subject_id', $subject->id)
            ->where('student_id', $student->id)
            ->firstOrFail();

        $grade->update($request->validated());

        return response()->json(new GradeResource($grade), 200);
    }
    public function destroy(Subject $subject, Student $student)
    {
        $grade = Grade::where('subject_id', $subject->id)
            ->where('student_id', $student->id)
            ->firstOrFail();

        $grade->delete();

        return response()->noContent();
    }
}
