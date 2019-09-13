<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class ControlDeCheque extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait;

    public $table = 'control_de_cheques';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'fecha_de_cobro',
        'fecha_de_entrega',
        'fecha_de_expedicion',
    ];

    protected $fillable = [
        'team_id',
        'cantidad',
        'created_at',
        'updated_at',
        'deleted_at',
        'descripcion',
        'fecha_de_cobro',
        'numero_de_cheque',
        'fecha_de_entrega',
        'fecha_de_expedicion',
        'nombre_a_quien_se_expide',
        'nombre_a_quien_se_entrego',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getFechaDeExpedicionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeExpedicionAttribute($value)
    {
        $this->attributes['fecha_de_expedicion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaDeEntregaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeEntregaAttribute($value)
    {
        $this->attributes['fecha_de_entrega'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaDeCobroAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeCobroAttribute($value)
    {
        $this->attributes['fecha_de_cobro'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getimagenDePolizaAttribute()
    {
        return $this->getMedia('imagen_de_poliza')->last();
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
