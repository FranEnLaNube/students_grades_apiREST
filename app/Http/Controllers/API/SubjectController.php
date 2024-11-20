<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Http\Requests\API\StoreSubjectRequest;
use Illuminate\Http\JsonResponse;

class SubjectController extends Controller
{
    public function index(): JsonResponse
    {
        $subjects = Subject::all();
        return response()->json($subjects, 200);
    }

    public function store(StoreSubjectRequest $request): JsonResponse
    {
        $subject = Subject::create($request->validated());
        return response()->json($subject, 201);
    }

    public function show(Subject $subject): JsonResponse
    {
        return response()->json($subject, 200);
    }
}
