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
        'created_at',
        'updated_at',
        'deleted_at',
        'provincia_id',
        'nombre_de_grupo',
    ];

    public function provincia()
    {
        return $this->belongsTo(Provincium::class, 'provincia_id');
    }
}
