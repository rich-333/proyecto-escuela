<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estudiante extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_estudiante';

    public $timestamps = false;

    protected $fillable = [
        'id_curso',
        'id_tutor',
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'ruta_imagen',
        'genero',
        'direccion',
        'ci',
        'estado'
    ];

    public function curso() {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    public function tutor() {
        return $this->belongsTo(Tutor::class, 'id_tutor');
    }
}
