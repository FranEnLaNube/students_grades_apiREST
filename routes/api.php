<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\GradeController;

Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

Route::apiResource('students', StudentController::class);
Route::apiResource('subjects', SubjectController::class);
Route::apiResource('grades', GradeController::class);
