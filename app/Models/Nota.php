<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';
    protected $primaryKey = 'id_nota';

    public $timestamps = false;

    protected $fillable = [
        'id_estudiante',
        'id_materia',
        'id_periodo',
        'nota'
    ];

    public function estudiante() {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }

    public function materia() {
        return $this->belongsTo(Materia::class, 'id_materia');
    }

    public function periodo() {
        return $this->belongsTo(Periodo::class, 'id_periodo');
    }
}
