<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\BoletinController;
use App\Http\Controllers\PensionController;
use App\Http\Controllers\TutorController;

Route::get('/login', [AuthController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [AuthController::class, 'procesarLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::delete('/estudiantes/{id}', [EstudianteController::class, 'eliminar'])->name('estudiantes.eliminar');
Route::post('/estudiantes', [EstudianteController::class, 'agregar'])->name('estudiantes.agregar');
Route::get('/estudiantes/crear', [EstudianteController::class, 'create'])->name('estudiante.create');

Route::get('/estudiantes/{id}/editar', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{id}', [EstudianteController::class, 'update'])->name('estudiantes.actualizar');

Route::get('/profesor', [CalificacionController::class, 'panel'])->name('profesor.panel');
Route::get('/profesor/materia/{id_materia}/cursos', [CalificacionController::class, 'mostrarCursos'])->name('profesor.materia.cursos');
Route::get('/profesor/materia/{id_materia}/curso/{id_curso}', [CalificacionController::class, 'mostrarEstudiantes'])->name('profesor.materia.curso');
Route::post('/profesor/notas/guardar-ajax', [CalificacionController::class, 'guardarAjax'])->name('calificaciones.guardarAjax');
Route::get('/notas/historial/{id_estudiante}/{id_materia}', function ($id_estudiante, $id_materia) {
    $historial = \App\Models\Nota::where('id_estudiante', $id_estudiante)
        ->where('id_materia', $id_materia)
        ->with('periodo')
        ->get();

    return response()->json($historial);
})->name('notas.historial');

Route::get('/boletin/ver/{id_estudiante}/{id_periodo}', [BoletinController::class, 'ver'])->name('boletin.ver');
Route::get('/boletin/descargar/{id_estudiante}/{id_periodo}', [BoletinController::class, 'descargar'])->name('boletin.descargar');

Route::get('/tutor', [TutorController::class, 'panel'])->name('tutor.panel');
Route::get('/tutor/{id_estudiante}/boletin', [BoletinController::class, 'mostrarBoletin'])->name('boletin.tutor');
Route::get('/tutor/{id_estudiante}/pensiones', [PensionController::class, 'mostrarPensiones'])->name('pensiones.tutor');

Route::get('/tutor/{id_estudiante}/boletin/{id_periodo}/ver', [BoletinController::class, 'ver'])->name('boletin.tutor.ver');
Route::get('/tutor/{id_estudiante}/boletin/{id_periodo}/descargar', [BoletinController::class, 'descargar'])->name('boletin.tutor.descargar');

Route::get('/tutor/{id_estudiante}/pensiones', [PensionController::class, 'verComoTutor'])->name('pensiones.tutor');

Route::get('/', function () {
    return view('welcome');
});
