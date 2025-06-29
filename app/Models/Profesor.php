<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesor';
    protected $primaryKey = 'id_profesor';
    
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'ci',
        'ruta_imagen',
        'direccion'
    ];

    public function materias() {
        return $this->belongsToMany(Materia::class, 'profesor_materia', 'id_profesor', 'id_materia');
    }

    public function cursos() {
        return $this->belongsToMany(Curso::class, 'profesor_curso', 'id_profesor', 'id_curso');
    }
}
