<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EtiquetasAcuerdosDeProvincium extends Model
{
    use SoftDeletes;

    public $table = 'etiquetas_acuerdos_de_provincia';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'updated_at',
        'created_at',
        'deleted_at',
        'etiqueta_acuerdo_de_provincia',
    ];

    public function acuerdosCeps()
    {
        return $this->belongsToMany(AcuerdosCep::class);
    }

    public function acuerdosCops()
    {
        return $this->belongsToMany(AcuerdosCop::class);
    }

    public function acuerdosCogs()
    {
        return $this->belongsToMany(AcuerdosCog::class);
    }
}
