<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $primaryKey = 'id_tutor';
    protected $table = 'tutor';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'ci',
        'fecha_nacimiento',
        'parentesco',
        'direccion',
        'telefono'
    ];

    public function estudiantes() {
        return $this->hasMany(Estudiante::class, 'id_tutor');
    }

    public function usuarios() {
        return $this->hasMany(Usuario::class, 'id_tutor');
    }
}
