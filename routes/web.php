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