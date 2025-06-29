<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class PensionController extends Controller
{
    public function mostrarPensiones($id_estudiante)
    {
        $estudiante = Estudiante::findOrFail($id_estudiante);
        return view('tutor.pension', compact('estudiante'));
    }
}
