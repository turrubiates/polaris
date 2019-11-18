<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provincium extends Model
{
    use SoftDeletes;

    public $table = 'provincia';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'created_at',
        'updated_at',
        'deleted_at',
        'nomenclatura',
    ];

    public function presupuestoAnuals()
    {
        return $this->hasMany(PresupuestoAnual::class, 'provincia_id', 'id');
    }

    public function actasCeps()
    {
        return $this->hasMany(ActasCep::class, 'provincia_id', 'id');
    }

    public function acuerdosCeps()
    {
        return $this->hasMany(AcuerdosCep::class, 'provincia_id', 'id');
    }

    public function actasDeCops()
    {
        return $this->hasMany(ActasDeCop::class, 'provincia_id', 'id');
    }

    public function acuerdosCops()
    {
        return $this->hasMany(AcuerdosCop::class, 'provincia_id', 'id');
    }

    public function actasCogs()
    {
        return $this->hasMany(ActasCog::class, 'provincia_id', 'id');
    }

    public function acuerdosCogs()
    {
        return $this->hasMany(AcuerdosCog::class, 'provincia_id', 'id');
    }
}
