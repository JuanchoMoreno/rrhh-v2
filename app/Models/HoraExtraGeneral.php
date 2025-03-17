<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class HoraExtraGeneral extends Model
{
    use HasFactory;

    protected $table = 'horas_extras_general';

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

    public function aprobador()
    {
        return $this->belongsTo(User::class, 'aprobador_id');
    }

    public function detalles()
    {
        return $this->hasMany(HoraExtraDetalle::class, 'horas_extras_general_id');
    }

    public static function obtenerHorasExtrasGenerales()
    {
        return DB::table('horas_extras_detalles AS hed')
            ->join('horas_extras_general AS heg', 'hed.horas_extras_general_id', '=', 'heg.id')
            ->join('users AS u', 'heg.usuario_id', '=', 'u.id')
            ->join('users AS a', 'heg.aprobador_id', '=', 'a.id') // Join adicional para obtener el nombre del aprobador
            ->join('departamentos AS dep', 'heg.depart_id', '=', 'dep.id')
            ->join('clases', 'heg.clases_id', '=', 'clases.id')
            ->join('ccostos', 'heg.ccostos_id', '=', 'ccostos.id')
            ->select(
                'u.name AS usuarioNombre',
                'u.documento AS usuarioDocumento',
                'a.name as aprobadorNombre',
                'dep.name AS departamentoNombre',
                'clases.name AS claseNombre',
                'ccostos.name AS ccostoNombre',
                'heg.id',
                'heg.mes_reportado',
                'heg.proyecto_asociado',
                'heg.actividad',
                'heg.estado',
                'heg.detalle_estado as detalleEstado',
                DB::raw('DATE_FORMAT(heg.created_at, "%d-%m-%Y") AS created_at'),
                DB::raw('(((hed.ex_diur_ord + hed.ex_noct_ord + hed.ex_diur_festdomin + hed.ex_noct_festdomin) + (hed.recargo_noct + hed.recargo_diur_fest + hed.recargo_noct_fest + hed.recargo_ord_fest_noct)) - hed.permisos) AS total_solicitud')
                // DB::raw('(hed.ex_diur_ord + hed.ex_noct_ord + hed.ex_diur_festdomin + hed.ex_noct_festdomin) AS suma_horas_extras'),
                // DB::raw('(hed.recargo_noct + hed.recargo_diur_fest + hed.recargo_noct_fest + hed.recargo_ord_fest_noct) AS suma_recargos'),
                // DB::raw('((hed.ex_diur_ord + hed.ex_noct_ord + hed.ex_diur_festdomin + hed.ex_noct_festdomin) + (hed.recargo_noct + hed.recargo_diur_fest + hed.recargo_noct_fest + hed.recargo_ord_fest_noct)) AS total_hrex_recargos'),
            )
            ->get();
    }
}