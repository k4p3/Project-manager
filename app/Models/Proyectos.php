<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'clave',
        'descripcion',
        'limite',
        'presupuesto',
        'documento',
        'area_id'
    ];

    protected $casts = [
       'documento' => 'json'
   ];

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setDocumentoAttribute($value){
        $this->attributes['documento'] = json_encode($value);
    }
}
