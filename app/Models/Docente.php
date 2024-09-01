<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Docente extends Model
{
    protected $table = 'docentes';

    protected $fillable = [
        'Nombre',
        'Apellido',
        'Fecha_Nacimiento',
        'Genero',
        'Direccion',
        'Telefono_Contacto',
        'Correo_Electronico',
        'Rol',
        'Fecha_Inicio',
    ];

    public function getNombreCompletoAttribute()
    {
        return $this->Nombre . ' ' . $this->Apellido;
    }

    public static function updatedStudent($id, Request $request)
    {
        $teacher = Estudiante::find($id);
        $teacher->Nombre = $request->input('Nombre');
        $teacher->Apellido = $request->input('Apellido');
        $teacher->Fecha_Nacimiento = $request->input('Fecha_Nacimiento');
        $teacher->Genero = $request->input('Genero');
        $teacher->Direccion = $request->input('Direccion');
        $teacher->Telefono_Contacto = $request->input('Telefono_Contacto');
        $teacher->Correo_Electronico = $request->input('Correo_Electronico');
        $teacher->Informacion_Medica = $request->input('Rol');
        $teacher->Fecha_Ingreso = $request->input('Fecha_Inicio');
        $teacher->save();
    }
}
