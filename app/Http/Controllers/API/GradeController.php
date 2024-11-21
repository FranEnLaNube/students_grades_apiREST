<?php

namespace App\Http\Controllers\API;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    public function overallAverage(): JsonResponse
    {
        $average = Grade::avg('grade');
        return response()->json(['overall_average' => $average], 200);
    }

    public function averageByStudent(Student $student): JsonResponse
    {
        $average = $student->grades()->avg('grade');
        return response()->json(['average' => $average], 200);
    }

    public function averageBySubject(Subject $subject): JsonResponse
    {
        $average = $subject->grades()->avg('grade');
        return response()->json(['average' => $average], 200);
    }
}
