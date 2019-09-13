<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class RegistroEvento extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'registro_eventos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'grupo_id',
        'evento_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function evento()
    {
        return $this->belongsTo(ListaDeEvento::class, 'evento_id');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    public function participantes_mls()
    {
        return $this->belongsToMany(User::class);
    }

    public function getComprobanteDePagoAttribute()
    {
        $files = $this->getMedia('comprobanteDePago');

        $files->each(function ($item) {
            $item->url = $item->getUrl();
        });

        return $files;
    }
}
