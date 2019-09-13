<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class ControlDeGasto extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait;

    public $table = 'control_de_gastos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'iva',
        'total',
        'team_id',
        'cheque_id',
        'evento_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'descripcion',
        'folio_fiscal',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function cheque()
    {
        return $this->belongsTo(ControlDeCheque::class, 'cheque_id');
    }

    public function evento()
    {
        return $this->belongsTo(ListaDeEvento::class, 'evento_id');
    }

    public function getnotasAttribute()
    {
        return $this->getMedia('notas');
    }

    public function getpdfAttribute()
    {
        return $this->getMedia('pdf')->last();
    }

    public function getxmlAttribute()
    {
        return $this->getMedia('xml')->last();
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
