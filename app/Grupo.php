<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use SoftDeletes;

    public $table = 'grupos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'grupo',
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
        'nombre_de_grupo',
    ];

    public function registroEventos()
    {
        return $this->hasMany(RegistroEvento::class, 'grupo_id', 'id');
    }

    public function actasCogs()
    {
        return $this->hasMany(ActasCog::class, 'grupo_id', 'id');
    }
}
