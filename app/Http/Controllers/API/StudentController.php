<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Requests\API\StoreStudentRequest;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    public function index(): JsonResponse
    {
        $students = Student::all();
        return response()->json($students, 200);
    }

    public function store(StoreStudentRequest $request): JsonResponse
    {
        $student = Student::create($request->validated());
        return response()->json($student, 201);
    }

    public function show(Student $student): JsonResponse
    {
        return response()->json($student, 200);
    }
}
