<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\StudentResource;
use App\Http\Requests\API\StoreStudentRequest;
use App\Http\Requests\API\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index(): JsonResponse
    {
        $students = Student::all();
        return response()->json(StudentResource::collection($students), 200);
    }

    public function store(StoreStudentRequest $request): JsonResponse
    {
        $student = Student::create($request->validated());
        return response()->json(new StudentResource($student), 201);
    }

    public function show(Student $student): JsonResponse
    {
        return response()->json(new StudentResource($student), 200);
    }

    public function update(UpdateStudentRequest $request, Student $student): JsonResponse
    {
        $student->update($request->validated());
        return response()->json(new StudentResource($student), 200);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->noContent();
    }
}
