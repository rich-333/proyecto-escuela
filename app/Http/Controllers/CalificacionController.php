<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Materia;
use App\Models\Estudiante;
use App\Models\Periodo;
use App\Models\Profesor;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CalificacionController extends Controller
{
    public function panel() {
        $profesor = Auth::user()->profesor;

        if (!$profesor) {
            abort(403, 'No autorizado');
        }

        $materias = $profesor->materias;
        $cursos = $profesor->cursos;

        return view('profesor.panel', compact('materias', 'cursos'));
    }   

    public function mostrarEstudiantes($id_materia, $id_curso)
    {
        $profesor = Auth::user()->profesor;

        $tieneCurso = $profesor->cursos()->where('curso.id_curso', $id_curso)->exists();
        $tieneMateria = $profesor->materias()->where('materia.id_materia', $id_materia)->exists();

        if (!$tieneCurso || !$tieneMateria) {
            abort(403, 'No autorizado');
        }

        $periodos = Periodo::all(); 

        $hoy = Carbon::now();
        $periodo_actual = $periodos->first(function ($p) use ($hoy) {
            return $hoy->between(Carbon::parse($p->fecha_inicio), Carbon::parse($p->fecha_fin));
        });

        $notas = Nota::where('id_materia', $id_materia)
            ->where('id_periodo', $periodo_actual->id_periodo ?? null)
            ->get()
            ->keyBy('id_estudiante');

        $estudiantes = Estudiante::where('id_curso', $id_curso)->get();
        $materia = Materia::findOrFail($id_materia);

        return view('profesor.materias', compact('estudiantes', 'periodo_actual', 'materia', 'notas'));
    }

    public function guardarAjax(Request $request)
    {
        $request->validate([
            'id_estudiante' => 'required|exists:estudiantes,id_estudiante',
            'id_materia' => 'required|exists:materia,id_materia',
            'id_periodo' => 'required|exists:periodo,id_periodo',
            'nota' => 'required|numeric|min:0|max:100',
        ]);

        $nota = Nota::updateOrCreate(
            [
                'id_estudiante' => $request->id_estudiante,
                'id_materia' => $request->id_materia,
                'id_periodo' => $request->id_periodo,
            ],
            [
                'nota' => $request->nota,
            ]
        );

        return response()->json(['mensaje' => $nota->wasRecentlyCreated ? 'Nota guardada' : 'Nota actualizada']);
    }
}
