<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use App\Models\Estudiante;
use App\Models\Nota;
use App\Models\Periodo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BoletinController extends Controller
{
    public function ver($id_estudiante, $id_periodo)
    {
        $estudiante = Estudiante::findOrFail($id_estudiante);
        $periodo = Periodo::findOrFail($id_periodo);
        $notas = Nota::with('materia')
            ->where('id_estudiante', $id_estudiante)
            ->where('id_periodo', $id_periodo)
            ->get();

        return view('boletines.pdf', compact('estudiante', 'periodo', 'notas'));
    }

    public function descargar($id_estudiante, $id_periodo)
    {
        $estudiante = Estudiante::findOrFail($id_estudiante);
        $periodo = Periodo::findOrFail($id_periodo);
        $notas = Nota::with('materia')
            ->where('id_estudiante', $id_estudiante)
            ->where('id_periodo', $id_periodo)
            ->get();

        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new Dompdf($options);

        
        $html = View::make('boletines.pdf', compact('estudiante', 'periodo', 'notas'))->render();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait'); /*landscape*/
        $pdf->render();

        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="boletin.pdf"');
    }

    public function mostrarBoletin($id_estudiante)
    {
        $estudiante = Estudiante::findOrFail($id_estudiante);

        $periodos = Periodo::whereDate('fecha_inicio', '<=', now())->get();

        if ($periodos->isEmpty()) {
            abort(404, 'No hay boletines disponibles.');
        }

        return view('tutor.boletin', compact('estudiante', 'periodos'));
    }

    public function verComoTutor($id_estudiante)
    {
        $tutor = Auth::user()->tutor;

        if (!$tutor || !$tutor->estudiantes->contains('id_estudiante', $id_estudiante)) {
            abort(403, 'No autorizado');
        }
        $estudiante = Estudiante::findOrFail($id_estudiante);

        $periodo = Periodo::whereDate('fecha_inicio', '<=', Carbon::now())
            ->whereDate('fecha_fin', '>=', Carbon::now())
            ->first();

        if (!$periodo) {
            abort(404, 'No hay un periodo activo en esta fecha.');
        }

        $notas = Nota::with('materia')
            ->where('id_estudiante', $id_estudiante)
            ->where('id_periodo', $periodo->id_periodo)
            ->get();

        return view('boletines.pdf', compact('estudiante', 'periodo', 'notas'));
    }

    public function descargarComoTutor($id_estudiante)
    {
        $tutor = Auth::user()->tutor;

        if (!$tutor || !$tutor->estudiantes->contains('id_estudiante', $id_estudiante)) {
            abort(403, 'No autorizado');
        }
        
        $estudiante = Estudiante::findOrFail($id_estudiante);

        $periodo = Periodo::whereDate('fecha_inicio', '<=', Carbon::now())
            ->whereDate('fecha_fin', '>=', Carbon::now())
            ->first();

        if (!$periodo) {
            abort(404, 'No hay un periodo activo en esta fecha.');
        }

        $notas = Nota::with('materia')
            ->where('id_estudiante', $id_estudiante)
            ->where('id_periodo', $periodo->id_periodo)
            ->get();

        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new \Dompdf\Dompdf($options);

        $html = View::make('boletines.pdf', compact('estudiante', 'periodo', 'notas'))->render();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="boletin.pdf"');
    }
}
