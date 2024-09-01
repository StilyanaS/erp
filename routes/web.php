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
Route::get('/studentDetail/{id}', [EstudianteController::class, 'show']);
Route::post('/updatedStudent', [EstudianteController::class, 'updatedStudent'])->name('updatedStudent');



