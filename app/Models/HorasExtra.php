<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Clases;
use App\Models\CentroCosto;

class HorasExtra extends Model
{
    use HasFactory;

    protected $table = 'horas_extras';

    public function horasExtrasGeneral()
    {
        return $this->belongsToMany(HorasExtrasGeneral::class, 'horas_extras_general_detalle', 'horas_extras_id', 'horas_extras_general_id');
    }

    public function horasExtrasDetalle()
    {
        return $this->belongsToMany(HorasExtrasDetalle::class, 'horas_extras_general_detalle', 'horas_extras_id', 'horas_extras_detalle_id');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class);
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
}