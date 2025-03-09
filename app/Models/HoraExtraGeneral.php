<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoraExtraGeneral extends Model
{
    use HasFactory;

    protected $table = 'horas_extras_gen';

    protected $guarded = [];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'depart_id');
    }

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'clases_id');
    }

    public function centroCosto()
    {
        return $this->belongsTo(CentroCosto::class, 'ccostos_id');
    }

    // Método accesor para obtener el nombre del departamento
    public function departamentoNombre()
    {
        return $this->departamento ? $this->departamento->name : null;
    }
    public function claseNombre()
    {
        return $this->clase ? $this->clase->name : null;
    }
    public function ccostoNombre()
    {
        return $this->centroCosto ? $this->centroCosto->name : null;
    }
    public function getFechaAttribute()
    {
        return $this->attributes['fecha'];
    }

}