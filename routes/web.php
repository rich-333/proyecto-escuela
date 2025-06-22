<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/iniciarsesion', function () {
    return view('iniciar_sesion/login');
});

Route::get('/estudiantes', function () {
    return view('estudiante/index');
});

Route::get('/profesores', function () {
    return view('profesor/index');
});

Route::get('/tutores', function () {
    return view('tutor/index');
});

Route::get('/inscripciones', function () {
    return view('inscripcion/index');
});

Route::get('/pensiones', function () {
    return view('pensiones/index');
});

Route::get('/agregarEstudiante', function () {
    return view('registrar/index');
});

Route::get('/materias', function () {
    return view('profesor/materias');
});

Route::get('/estudiante', function () {
    return view('tutor/boletin');
});

Route::get('/pension', function () {
    return view('tutor/pensiones');
});