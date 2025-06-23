<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_curso';
    protected $table = 'curso';
    
    public $timestamps = false;

    protected $fillable = [
        'grado',
        'paralelo'
    ];
    
    public function estudiantes() {
        return $this->hasMany(Estudiante::class, 'id_curso');
    }
}
