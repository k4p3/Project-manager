<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosSeguimiento extends Model
{
    use HasFactory;

    protected $table = 'proyectos_seguimiento';

    protected $fillable = [
        'proyectos_id',
        'user_id',
    ];
}
