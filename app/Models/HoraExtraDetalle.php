<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class HoraExtraDetalle extends Model
{
    use HasFactory;

    protected $table = 'horas_extras_detalles';

    protected $guarded = [];

    public function horaExtraGeneral()
    {
        return $this->belongsTo(HoraExtraGeneral::class, 'hora_extra_general_id');
    }
    public static function obtenerHorasExtrasDetalles()
    {
        return DB::table('horas_extras_detalles AS hed')
            ->join('horas_extras_general AS heg', 'hed.horas_extras_general_id', '=', 'heg.id')
            ->join('users AS u', 'heg.usuario_id', '=', 'u.id')
            ->join('departamentos AS dep', 'heg.depart_id', '=', 'dep.id')
            ->join('clases', 'heg.clases_id', '=', 'clases.id')
            ->join('ccostos', 'heg.ccostos_id', '=', 'ccostos.id')
            ->select(
                'hed.fecha_reporte',
                'hed.permisos',
                'hed.ex_diur_ord',
                'hed.ex_noct_ord',
                'hed.ex_diur_festdomin',
                'hed.ex_noct_festdomin',
                'hed.recargo_noct',
                'hed.recargo_diur_fest',
                'hed.recargo_noct_fest',
                'hed.recargo_ord_fest_noct',
                DB::raw('(hed.ex_diur_ord + hed.ex_noct_ord + hed.ex_diur_festdomin + hed.ex_noct_festdomin) AS suma_horas_extras'),
                DB::raw('(hed.recargo_noct + hed.recargo_diur_fest + hed.recargo_noct_fest + hed.recargo_ord_fest_noct) AS suma_recargos'),
                DB::raw('((hed.ex_diur_ord + hed.ex_noct_ord + hed.ex_diur_festdomin + hed.ex_noct_festdomin) + (hed.recargo_noct + hed.recargo_diur_fest + hed.recargo_noct_fest + hed.recargo_ord_fest_noct)) AS total_hrex_recargos'),
                DB::raw('(((hed.ex_diur_ord + hed.ex_noct_ord + hed.ex_diur_festdomin + hed.ex_noct_festdomin) + (hed.recargo_noct + hed.recargo_diur_fest + hed.recargo_noct_fest + hed.recargo_ord_fest_noct)) - hed.permisos) AS total_solicitud')
            )
            ->get();
    }
}