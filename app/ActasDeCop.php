<?php

namespace App;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class ActasDeCop extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait, Auditable;

    public $table = 'actas_de_cops';

    protected $appends = [
        'imagen_de_acta',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'fecha_de_acta',
        'fecha_de_convocatoria',
    ];

    protected $fillable = [
        'lugar',
        'team_id',
        'vobo_id',
        'hora_fin',
        'relatoria',
        'created_at',
        'updated_at',
        'deleted_at',
        'hora_inicio',
        'provincia_id',
        'orden_del_dia',
        'fecha_de_acta',
        'observaciones',
        'numero_de_acta',
        'fecha_de_convocatoria',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function getFechaDeConvocatoriaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeConvocatoriaAttribute($value)
    {
        $this->attributes['fecha_de_convocatoria'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function provincia()
    {
        return $this->belongsTo(Provincium::class, 'provincia_id');
    }

    public function getFechaDeActaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeActaAttribute($value)
    {
        $this->attributes['fecha_de_acta'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function asistentes()
    {
        return $this->belongsToMany(User::class);
    }

    public function getImagenDeActaAttribute()
    {
        return $this->getMedia('imagen_de_acta')->last();
    }

    public function vobo()
    {
        return $this->belongsTo(User::class, 'vobo_id');
    }
}
