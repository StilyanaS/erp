<?php

use App\Http\Controllers\EstudianteController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('new-student', [EstudianteController::class, 'storeStudent']);
Route::get('/showStudent/{id}', [EstudianteController::class, 'show']);
Route::get('/studentsJson', [EstudianteController::class, 'studentsJson']);
Route::get('/csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);
});
Route::get('/csrf-cookie', function () {
    return response()->json(['csrf-token' => csrf_token()]);
})->middleware('web');

