<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodo';
    protected $primaryKey = 'id_periodo';

    public $timestamps = false;

    protected $fillable = [
        'trimestre',
        'fecha_inicio',
        'fecha_fin'
    ];
}
