<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Http\Requests\API\StoreGradeRequest;
use Illuminate\Http\JsonResponse;

class GradeController extends Controller
{
    public function index(): JsonResponse
    {
        $grades = Grade::with(['student', 'subject'])->get();
        return response()->json($grades, 200);
    }

    public function store(StoreGradeRequest $request): JsonResponse
    {
        $grade = Grade::create($request->validated());
        return response()->json($grade, 201);
    }

    public function show(Grade $grade): JsonResponse
    {
        $grade->load(['student', 'subject']);
        return response()->json($grade, 200);
    }
}
