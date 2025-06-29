<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administrador';
    protected $primaryKey = 'id_administrador';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'ci',
        'direccion'
    ];
}
