<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SolicitudDeCambioDeGrupo extends Model
{
    use SoftDeletes;

    public $table = 'solicitud_de_cambio_de_grupos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'fecha_de_cambio',
        'fecha_de_solicitud',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'solicitante',
        'grupo_saliente',
        'grupo_entrante',
        'fecha_de_cambio',
        'fecha_de_solicitud',
        'persona_a_cambiar_id',
        'cambio_realizado_por',
        'observaciones_de_grupo_saliente',
    ];

    public function getFechaDeSolicitudAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeSolicitudAttribute($value)
    {
        $this->attributes['fecha_de_solicitud'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function persona_a_cambiar()
    {
        return $this->belongsTo(User::class, 'persona_a_cambiar_id');
    }

    public function getFechaDeCambioAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeCambioAttribute($value)
    {
        $this->attributes['fecha_de_cambio'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
