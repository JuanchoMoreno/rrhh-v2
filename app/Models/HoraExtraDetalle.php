<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoraExtraDetalle extends Model
{
    use HasFactory;

    // Define el nombre correcto de la tabla
    protected $table = 'horas_extras_det';

    // Protege todos los atributos de asignación masiva
    protected $guarded = [];
}