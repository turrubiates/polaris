<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuiaDeAcm extends Model
{
    use SoftDeletes;

    public $table = 'guia_de_acms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'acm',
        'cargo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
