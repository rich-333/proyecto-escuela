<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.profesores', function ($view) {
            if (Auth::check() && Auth::user()->rol === 'Profesor') {
                $profesor = Auth::user()->profesor;

                if ($profesor) {
                    $materias = $profesor->materias;

                    $materiasConCursos = $materias->map(function ($materia) use ($profesor) {
                        
                        $cursos = $profesor->cursos;

                        return [
                            'materia' => $materia,
                            'cursos' => $cursos
                        ];
                    });

                    $view->with('materiasConCursos', $materiasConCursos);
                }
            }
        });
    }
}
