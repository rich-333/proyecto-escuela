<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    protected $table = 'pensiones';
    protected $primaryKey = 'id_pension';
    public $timestamps = false;

    protected $fillable = [
        'mes',
        'anio',
        'monto',
        'fecha_pago',
        'concepto',
        'metodo_pago',
        'estado'
    ];

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiante_pensiones', 'id_pension', 'id_estudiante');
    }
}
