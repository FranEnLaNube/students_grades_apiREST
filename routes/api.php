<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GradeController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\StudentGradesController;
use App\Http\Controllers\API\SubjectGradesController;

Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});
Route::prefix('students')->group(function () {
    Route::apiResource('/', StudentController::class)->parameters(['' => 'student']);
    Route::get('{student}/grades', [StudentGradesController::class, 'index']);
    Route::post('{student}/grades/{subject}', [StudentGradesController::class, 'store']);
    Route::get('{student}/grades/{subject}', [StudentGradesController::class, 'show']);
    Route::patch('{student}/grades/{subject}', [StudentGradesController::class, 'update']);
    Route::delete('{student}/grades/{subject}', [StudentGradesController::class, 'destroy']);
    Route::get('{student}/average', [GradeController::class, 'averageByStudent']);
});
Route::prefix('subjects')->group(function () {
    Route::apiResource('/', SubjectController::class)->parameters(['' => 'subject']);
    Route::get('{subject}/grades', [SubjectGradesController::class, 'index']);
    Route::post('{subject}/grades/{student}', [SubjectGradesController::class, 'store']);
    Route::get('{subject}/grades/{student}', [SubjectGradesController::class, 'show']);
    Route::patch('{subject}/grades/{student}', [SubjectGradesController::class, 'update']);
    Route::delete('{subject}/grades/{student}', [SubjectGradesController::class, 'destroy']);
    Route::get('{subject}/average', [GradeController::class, 'averageBySubject']);
});
Route::prefix('grades')->group(function () {
    Route::get('overall-average', [GradeController::class, 'overallAverage']);
});
