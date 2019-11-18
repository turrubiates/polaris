<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Regnal extends Model
{
    use SoftDeletes;

    public $table = 'regnals';

    protected $dates = [
        'vigencia',
        'nacimiento',
        'created_at',
        'updated_at',
        'deleted_at',
        'miembro_desde',
    ];

    protected $fillable = [
        'cum',
        'sexo',
        'curp',
        'email',
        'cargo',
        'grupo',
        'nombre',
        'estado',
        'seccion',
        'colonia',
        'distrito',
        'vigencia',
        'religion',
        'localidad',
        'domicilio',
        'ocupacion',
        'municipio',
        'provincia',
        'updated_at',
        'created_at',
        'deleted_at',
        'nacimiento',
        'miembro_desde',
        'apellido_materno',
        'apellido_paterno',
        'telefono_oficina',
        'telefono_particular',
    ];

    public function getNacimientoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setNacimientoAttribute($value)
    {
        $this->attributes['nacimiento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getVigenciaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setVigenciaAttribute($value)
    {
        $this->attributes['vigencia'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getMiembroDesdeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMiembroDesdeAttribute($value)
    {
        $this->attributes['miembro_desde'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
