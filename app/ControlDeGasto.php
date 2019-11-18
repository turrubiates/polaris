<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class ControlDeGasto extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'control_de_gastos';

    protected $appends = [
        'xml',
        'pdf',
        'notas',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'iva',
        'total',
        'cheque_id',
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

    public function getNotasAttribute()
    {
        return $this->getMedia('notas');
    }

    public function getPdfAttribute()
    {
        return $this->getMedia('pdf')->last();
    }

    public function getXmlAttribute()
    {
        return $this->getMedia('xml')->last();
    }
}
