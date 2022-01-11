<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avion extends Model
{
    use HasFactory;

    // nombre de la tabla en lugar de Avions se va a llamar aviones.
    protected $table = 'aviones';

    // Vamos a indicarle q la clave primaria no va a ser id, va a ser un campo "serie".
    protected $primaryKey = 'serie';

    // Atributos que se pueden asignar de manera masiva.
    protected $fillable = array('modelo', 'longitud', 'capacidad', 'velocidad', 'alcance');

    // Aquí ponemos los campos que no queremos que se devuelvan en las consultas.
    protected $hidden = ['created_at', 'updated_at'];

    public function fabricante()
    {
        return $this->belongsTo('\App\Models\Fabricante');
    }
}
