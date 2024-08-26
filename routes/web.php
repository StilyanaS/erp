<?php

use App\Models\Estudiante;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prueba', function () {
    return [
        'title' => 'titulito',
        'description' => 'descripcion cualquiera',
    ];
})-> name('prueba');
Route::match(['get', 'post'],'/estudiantes', [EstudianteController::class,'index']);
Route::get('/estudiante', [EstudianteController::class,'create']);
Route::post('/creado', [EstudianteController::class,'store']) -> name('insertStudent');
Route::get('/exito', function(){ return view('creado');})-> name('exito');
Route::get('/updateStudent/{id}', [EstudianteController::class, 'updateStudent'])->name('updateStudent');
Route::get('/studentDetail/{id}', [EstudianteController::class, 'show']);
Route::post('/updatedStudent', [EstudianteController::class, 'updatedStudent'])->name('updatedStudent');
Route::get('/studentDetail', [EstudianteController::class, 'studentDetail'])->name('studentDetail');

Route::get('/studentsJson', [EstudianteController::class,'studentsJson']);
Route::get('/showStudent/{id}', [EstudianteController::class, 'show']);
Route::post('/newStudent', [EstudianteController::class, 'storeStudent']);
Route::get('/csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);
});
Route::get('/csrf-cookie', function () {
    return response()->json(['csrf-token' => csrf_token()]);
})->middleware('web');

