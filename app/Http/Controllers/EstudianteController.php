<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Tutor;
use App\Models\Curso;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    public function index() {
        $estudiantes = Estudiante::with(['curso', 'tutor'])->get();
        return view('estudiante.index', compact('estudiantes'));
    }

    public function eliminar($id){
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiante.index')->with('eliminado', 'Estudiante eliminado correctamente.');
    }

    public function agregar(Request $request){
        if (!$request->boolean('nuevo_tutor')) {
            $request->request->remove('tutor_nombre');
            $request->request->remove('tutor_apellido');
            $request->request->remove('tutor_ci');
            $request->request->remove('tutor_fecha_nacimiento');
            $request->request->remove('tutor_direccion');
            $request->request->remove('tutor_telefono');
            $request->request->remove('tutor_parentesco');
            $request->request->remove('correo');
            $request->request->remove('nombre_usuario');
            $request->request->remove('contrasena');
        }

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

            'nuevo_tutor' => 'nullable|boolean',
            'tutor_nombre' => 'required_if:nuevo_tutor,1',
            'tutor_apellido' => 'required_if:nuevo_tutor,1',
            'tutor_ci' => 'required_if:nuevo_tutor,1',
            'tutor_fecha_nacimiento' => 'required_if:nuevo_tutor,1|nullable|date',
            'tutor_direccion' => 'required_if:nuevo_tutor,1',
            'tutor_telefono' => 'required_if:nuevo_tutor,1',
            'tutor_parentesco' => 'required_if:nuevo_tutor,1',

            'nombre_usuario' => 'required_if:nuevo_tutor,1|unique:usuarios,nombre_usuario',
            'contrasena' => 'required_if:nuevo_tutor,1|min:6',
            'correo' => 'required_if:nuevo_tutor,1|email|unique:usuarios,correo',
        ]);

        if ($request->boolean('nuevo_tutor')) {
            $tutor = Tutor::create([
                'nombre' => $request->tutor_nombre,
                'apellido' => $request->tutor_apellido,
                'ci' => $request->tutor_ci,
                'fecha_nacimiento' => $request->tutor_fecha_nacimiento,
                'direccion' => $request->tutor_direccion,
                'telefono' => $request->tutor_telefono,
                'parentesco' => $request->tutor_parentesco,
            ]);

            Usuario::create([
                'nombre_usuario' => $request->input('nombre_usuario'),
                'contrasena' => bcrypt($request->input('contrasena')),
                'correo' => $request->input('correo'),
                'rol' => 'Tutor',
                'id_tutor' => $tutor->id_tutor,
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

        return redirect()->route('estudiante.index')->with('creado', 'Estudiante registrado exitosamente.');
    }

    public function create()
    {
        $cursos = Curso::all();
        $tutores = Tutor::all();
        return view('registrar.index', compact('cursos', 'tutores'));
    }

    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $cursos = Curso::all();
        $tutores = Tutor::all();

        return view('editar.index', compact('estudiante', 'cursos', 'tutores'));
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'genero' => 'required|in:M,F',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'required|string',
            'ci' => 'required|string|unique:estudiantes,ci,' . $id . ',id_estudiante',
            'estado' => 'required|in:Activo,Retirado,Graduado',
            'curso' => 'required|exists:curso,id_curso',
            'tutor' => 'required|exists:tutor,id_tutor',
            'ruta_imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('ruta_imagen')) {
            if ($estudiante->ruta_imagen) {
                Storage::disk('public')->delete($estudiante->ruta_imagen);
            }
            $estudiante->ruta_imagen = $request->file('ruta_imagen')->store('estudiantes', 'public');
        }

        $estudiante->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'direccion' => $request->direccion,
            'ci' => $request->ci,
            'estado' => $request->estado,
            'id_curso' => $request->curso,
            'id_tutor' => $request->tutor,
        ]);

        return redirect()->route('estudiante.index')->with('editado', 'Estudiante actualizado correctamente.');
    }
}
