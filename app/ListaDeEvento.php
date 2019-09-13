<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListaDeEvento extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'lista_de_eventos';

    const COSTO_RADIO = [
        'No' => 'No',
        'Si' => 'Si',
    ];

    const NIVEL_SELECT = [
        'Nacional'  => 'Nacional',
        'Provincia' => 'Provincia',
        'Grupo'     => 'Grupo',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'fin_de_evento',
        'fecha_de_pago_1',
        'fecha_de_pago_2',
        'fecha_de_pago_3',
        'inicio_de_evento',
    ];

    const ADULTOS_RESPONSABLES_SELECT = [
        'Rovers'        => 'Rovers',
        'Scouters'      => 'Scouters',
        'Dirigentes'    => 'Dirigentes',
        'Padres Scouts' => 'Padres Scouts',
        'Invitados'     => 'Invitados',
    ];

    const STAFF_SELECT = [
        'Caminantes'    => 'Caminantes',
        'Rovers'        => 'Rovers',
        'Scouters'      => 'Scouters',
        'Dirigentes'    => 'Dirigentes',
        'Padres Scouts' => 'Padres Scouts',
        'Invitados'     => 'Invitados',
    ];

    const PARTICIPANTES_SELECT = [
        'Manada de Lobatos'       => 'Manada de Lobatos',
        'Tropa de Scouts'         => 'Tropa de Scouts',
        'Comunidad de Caminantes' => 'Comunidad de Caminantes',
        'Clan de Rovers'          => 'Clan de Rovers',
        'Scouters y Dirigentes'   => 'Scouters y Dirigentes',
        'Padres Scouts'           => 'Padres Scouts',
        'Invitados'               => 'Invitados',
    ];

    protected $fillable = [
        'nivel',
        'staff',
        'costo',
        'team_id',
        'deleted_at',
        'updated_at',
        'created_at',
        'participantes',
        'fin_de_evento',
        'lugar_de_evento',
        'fecha_de_pago_3',
        'fecha_de_pago_1',
        'fecha_de_pago_2',
        'nombre_de_evento',
        'inicio_de_evento',
        'referencia_de_pago',
        'costo_staff_fecha_1',
        'costo_staff_fecha_2',
        'costo_staff_fecha_3',
        'adultos_responsables',
        'costo_adultos_fecha_2',
        'costo_adultos_fecha_3',
        'costo_adultos_fecha_1',
        'responsable_de_evento_id',
        'costo_participantes_fecha_1',
        'costo_participantes_fecha_2',
        'costo_participantes_fecha_3',
    ];

    public function getInicioDeEventoAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setInicioDeEventoAttribute($value)
    {
        $this->attributes['inicio_de_evento'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getFinDeEventoAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setFinDeEventoAttribute($value)
    {
        $this->attributes['fin_de_evento'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function responsable_de_evento()
    {
        return $this->belongsTo(User::class, 'responsable_de_evento_id');
    }

    public function getFechaDePago1Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDePago1Attribute($value)
    {
        $this->attributes['fecha_de_pago_1'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaDePago2Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDePago2Attribute($value)
    {
        $this->attributes['fecha_de_pago_2'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaDePago3Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDePago3Attribute($value)
    {
        $this->attributes['fecha_de_pago_3'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
