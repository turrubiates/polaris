<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FichaMedica extends Model
{
    use SoftDeletes;

    public $table = 'ficha_medicas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'miembro_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function miembro()
    {
        return $this->belongsTo(User::class, 'miembro_id');
    }
}
