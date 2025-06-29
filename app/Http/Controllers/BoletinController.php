<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use App\Models\Estudiante;
use App\Models\Nota;
use App\Models\Periodo;

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
}
