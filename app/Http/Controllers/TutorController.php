<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{
    public function panel()
    {
        $tutor = Auth::user()->tutor;

        if (!$tutor) {
            abort(403, 'No autorizado');
        }

        $estudiantes = $tutor->estudiantes;

        return view('tutor.panel', compact('tutor', 'estudiantes'));
    }
}
