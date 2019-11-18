<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

    public $table = 'teams';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'team_id', 'id');
    }

    public function actasCeps()
    {
        return $this->hasMany(ActasCep::class, 'team_id', 'id');
    }

    public function acuerdosCeps()
    {
        return $this->hasMany(AcuerdosCep::class, 'team_id', 'id');
    }

    public function actasDeCops()
    {
        return $this->hasMany(ActasDeCop::class, 'team_id', 'id');
    }

    public function acuerdosCops()
    {
        return $this->hasMany(AcuerdosCop::class, 'team_id', 'id');
    }

    public function actasCogs()
    {
        return $this->hasMany(ActasCog::class, 'team_id', 'id');
    }

    public function acuerdosCogs()
    {
        return $this->hasMany(AcuerdosCog::class, 'team_id', 'id');
    }
}
