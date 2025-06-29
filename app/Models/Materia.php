<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materia';
    protected $primaryKey = 'id_materia';

    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];
    
    public function notas() {
        return $this->hasMany(Nota::class, 'id_materia');
    }

    public function profesores(){
        return $this->belongsToMany(Profesor::class, 'profesor_materia', 'id_materia', 'id_profesor');
    }
}
