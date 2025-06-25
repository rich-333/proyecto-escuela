<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Tutor;
use App\Models\Curso;

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

    public function agregar(Request $request){
        $validated = $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'genero' => 'required|in:M,F',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'required|string',
            'ci' => 'required|string|unique:estudiantes,ci',
            'estado' => 'required|in:Activo,Retirado,Graduado',
            'ruta_imagen' => 'nullable|image|max:2048',
            'curso' => 'required|exists:curso,id_curso',
            'tutor' => 'nullable|exists:tutor,id_tutor',

            'nuevo_tutor' => 'sometimes',
            'tutor_nombre' => 'required_if:nuevo_tutor,on',
            'tutor_apellido' => 'required_if:nuevo_tutor,on',
            'tutor_ci' => 'required_if:nuevo_tutor,on',
            'tutor_fecha_nacimiento' => 'required_if:nuevo_tutor,on|nullable|date',
            'tutor_direccion' => 'required_if:nuevo_tutor,on',
            'tutor_telefono' => 'required_if:nuevo_tutor,on',
            'tutor_parentesco' => 'required_if:nuevo_tutor,on',
        ]);

        if ($request->has('nuevo_tutor')) {
            $tutor = Tutor::create([
                'nombre' => $request->tutor_nombre,
                'apellido' => $request->tutor_apellido,
                'ci' => $request->tutor_ci,
                'fecha_nacimiento' => $request->tutor_fecha_nacimiento,
                'direccion' => $request->tutor_direccion,
                'telefono' => $request->tutor_telefono,
                'parentesco' => $request->tutor_parentesco,
            ]);
            $tutor_id = $tutor->id_tutor;
        } else {
            $tutor_id = $request->tutor;
        }

        $rutaImagen = null;
        if ($request->hasFile('ruta_imagen')) {
            $rutaImagen = $request->file('ruta_imagen')->store('estudiantes', 'public');
        }

        Estudiante::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'direccion' => $request->direccion,
            'ci' => $request->ci,
            'estado' => $request->estado,
            'ruta_imagen' => $rutaImagen,
            'id_curso' => $request->curso,
            'id_tutor' => $tutor_id,
        ]);

        return redirect()->route('estudiante.index')->with('success', 'Estudiante registrado exitosamente.');
    }

    public function create()
    {
        $cursos = Curso::all();
        $tutores = Tutor::all();
        return view('registrar.index', compact('cursos', 'tutores'));
    }
}
