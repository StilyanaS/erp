<?php

namespace App\Http\Controllers;

use App\Http\Requests\insertStudent;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Session;
use  Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiante = Estudiante::all();

        return view('estudiantes', compact('estudiante'));
    }
    public function studentsJson()
    {
        $estudiantes = Estudiante::all();

        return response()->json($estudiantes);
    }

    public function create()
    {
        return view('estudiante');
    }

    public function store(Request $request)
    {
        Estudiante::create($request->all());

        return redirect()->route('exito');
    }

    public function storeStudent(insertStudent $request)
    {
        //dd('post api called');
        /*$student = Estudiante::create($request->all());
        return response() -> json($student);*/
        return response()->json(['mensaje' => 'hola']);
    }

    public function show($id)
    {
        Session::put('id', $id);
        $student = Estudiante::findId($id);
        return response()->json($student);
    }

    public function test()
    {
        return response()->json(['mensaje' => 'hola']);
    }

    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index');
    }

    public function updateStudent($id)
    {
        $student = Estudiante::findId($id);
        Session::put('id', $id);
        return view('updateStudent', compact('student'));
    }
    public function updatedStudent(Request $request)
    {
        $id = Session::get('id');
        Estudiante::updatedStudent($id, $request);
        return Redirect::to('/studentDetail');
    }

    public function studentDetail()
    {
        $id = Session::get('id');
        $student = Estudiante::findId($id);
        return view('studentDetail', compact('student'));
    }

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index');
    }
}
