<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    public function index() {
        $estudiantes = Estudiante::with(['curso', 'tutor'])->get();
        return view('estudiante.index', compact('estudiantes'));
    }

    public function eliminar($id){
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiante.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
