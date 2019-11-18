<?php

namespace App;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcuerdosCop extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    public $table = 'acuerdos_cops';

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fecha',
        'team_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'provincia_id',
        'numero_de_acuerdo',
        'descripcion_de_acuerdo',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function getFechaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function provincia()
    {
        return $this->belongsTo(Provincium::class, 'provincia_id');
    }

    public function votos_a_favors()
    {
        return $this->belongsToMany(User::class);
    }

    public function etiquetas()
    {
        return $this->belongsToMany(EtiquetasAcuerdosDeProvincium::class);
    }
}
