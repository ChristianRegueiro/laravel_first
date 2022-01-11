<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    use HasFactory;

    // Aqui asumimos por defecto que la tabla se va a llamar fabricantes y va a tener un campo id autonumérico como clave primaria.

    // Atributos que se pueden asignar de manera masiva.
    protected $fillable = array('nombre', 'direccion', 'telefono');

    public function aviones()
    {
        // 1 fabricante tiene muchos aviones.
        return $this->hasMany('\App\Models\Avion');
    }
}
