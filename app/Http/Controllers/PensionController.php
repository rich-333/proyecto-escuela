<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Auth;

class PensionController extends Controller
{
    public function mostrarPensiones($id_estudiante)
    {
        $estudiante = Estudiante::findOrFail($id_estudiante);
        return view('tutor.pension', compact('estudiante'));
    }

    public function verComoTutor($id_estudiante)
    {
        $tutor = Auth::user()->tutor;

        if (!$tutor || !$tutor->estudiantes->contains('id_estudiante', $id_estudiante)) {
            abort(403, 'No autorizado');
        }
        
        $estudiante = Estudiante::with('pensiones')->findOrFail($id_estudiante);
        $pensionesPorMes = $estudiante->pensiones->groupBy('mes');

        return view('tutor.pensiones', compact('estudiante', 'pensionesPorMes'));
    }
}
