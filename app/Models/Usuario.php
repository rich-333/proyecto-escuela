<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
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
        'id_administrador'
    ];

    public function getAuthPassword(){
        return $this->contrasena;
    }

    public function profesor(){
        return $this->belongsTo(Profesor::class, 'id_profesor');
    }

    public function tutor(){
        return $this->belongsTo(Tutor::class, 'id_tutor');
    }

    public function administrador(){
        return $this->belongsTo(Administrador::class, 'id_administrador');
    }
}
