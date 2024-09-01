<?php

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('new-student', [EstudianteController::class, 'storeStudent']);
Route::get('/showStudent/{id}', [EstudianteController::class, 'show']);
Route::get('/studentsJson', [EstudianteController::class, 'studentsJson']);
Route::put('/update-student/{id}', [EstudianteController::class, 'update']);
Route::get('/csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);
});
Route::get('/csrf-cookie', function () {
    return response()->json(['csrf-token' => csrf_token()]);
})->middleware('web');

Route::middleware('auth:sanctum')->delete('/estudiantes/{id}', [EstudianteController::class, 'deleteStudent']);

Route::get('/delete-student/{id}', [EstudianteController::class, 'destroy']);
Route::get('/delete-teacher/{id}', [DocenteController::class, 'destroy']);

Route::post('new-teacher', [DocenteController::class, 'storeTeacher']);
Route::get('/showTeacher/{id}', [DocenteController::class, 'show']);
Route::get('/teachersJson', [DocenteController::class, 'teachersJson']);
Route::middleware('auth:sanctum')->delete('/docentes/{id}', [DocenteController::class, 'deleteTeacher']);
