<?php
// filepath: /c:/xampp/htdocs/rrhh-v2/app/Models/HorasExtrasGeneral.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorasExtrasGeneral extends Model
{
    use HasFactory;

    public function horasExtras()
    {
        return $this->belongsToMany(HorasExtra::class, 'horas_extras_general_detalle', 'horas_extras_general_id', 'horas_extras_id');
    }
}