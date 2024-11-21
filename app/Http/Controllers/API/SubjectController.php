<?php

namespace App\Http\Controllers\API;

use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\SubjectResource;
use App\Http\Requests\API\StoreSubjectRequest;
use App\Http\Requests\API\UpdateSubjectRequest;

class SubjectController extends Controller
{
    public function index(): JsonResponse
    {
        $subjects = Subject::all();
        return response()->json(SubjectResource::collection($subjects), 200);
    }

    public function store(StoreSubjectRequest $request): JsonResponse
    {
        $subject = Subject::create($request->validated());
        return response()->json(new SubjectResource($subject), 201);
    }

    public function show(Subject $subject): JsonResponse
    {
        $subject->load('grades.student');
        return response()->json(new SubjectResource($subject), 200);
    }

    public function update(UpdateSubjectRequest $request, Subject $subject): JsonResponse
    {
        $subject->update($request->validated());
        return response()->json(new SubjectResource($subject), 200);
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->noContent();
    }
}
