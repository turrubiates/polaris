<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PresupuestoAnual extends Model
{
    use SoftDeletes;

    public $table = 'presupuesto_anuals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TIPO_RADIO = [
        'Ingreso' => 'Ingreso',
        'Egreso'  => 'Egreso',
    ];

    protected $fillable = [
        'tipo',
        'periodo',
        'partida',
        'deleted_at',
        'updated_at',
        'created_at',
        'provincia_id',
        'presupuestado_abr',
        'presupuestado_may',
        'presupuestado_mar',
        'presupuestado_jul',
        'presupuestado_ago',
        'presupuestado_sep',
        'presupuestado_oct',
        'presupuestado_nov',
        'presupuestado_dic',
        'presupuestado_feb',
        'presupuestado_ene',
        'presupuestado_jun',
    ];

    public function provincia()
    {
        return $this->belongsTo(Provincium::class, 'provincia_id');
    }
}
