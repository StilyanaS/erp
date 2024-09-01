<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::all();

        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        return view('docentes.create');
    }

    public function store(Request $request)
    {
        Docente::create($request->all());

        return redirect()->route('docentes.index');
    }

    public function show(Docente $docente)
    {
        return view('docentes.show', compact('docente'));
    }

    public function edit(Docente $docente)
    {
        return view('docentes.edit', compact('docente'));
    }

    public function update(Request $request, $id)
    {
        $docente = Docente::find($id);
        if (is_null($docente)) {
            return response()->json(['message' => 'El docente no existe'], 404);
        }
        $docente->update($request->all());
        return response($docente, 200);
    }

    public function updateTeacher($id)
    {
        $teacher = Docente::findId($id);
        Session::put('id', $id);
        return view('updateTeacher', compact('teacher'));
    }
    public function updatedTeacher(Request $request)
    {
        $id = Session::get('id');
        Docente::updatedStudent($id, $request);
        return Redirect::to('/teacherDetail');
    }

    public function destroy(Docente $docente)
    {
        $docente->delete();

        return redirect()->route('docentes.index');
    }
}
