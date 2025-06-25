<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'id_usuario';
    protected $table = 'usuarios';

    public $timestamps = false;

    protected $fillable = [
        'nombre_usuario',
        'contrasena',
        'correo',
        'rol',
        'id_tutor',
        'id_profesor',
    ];
}
