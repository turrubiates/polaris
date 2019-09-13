<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AvisosDeSalida extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'avisos_de_salidas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'team_id',
        'grupo_id',
        'evento_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function evento()
    {
        return $this->belongsTo(ListaDeEvento::class, 'evento_id');
    }

    public function participantes()
    {
        return $this->belongsToMany(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
}
