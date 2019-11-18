<?php

namespace App;

use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    public $table = 'users';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'vigencia',
        'nacimiento',
        'created_at',
        'updated_at',
        'deleted_at',
        'miembro_desde',
        'email_verified_at',
    ];

    protected $fillable = [
        'cum',
        'sexo',
        'curp',
        'name',
        'email',
        'cargo',
        'grupo',
        'estado',
        'team_id',
        'colonia',
        'seccion',
        'distrito',
        'password',
        'religion',
        'vigencia',
        'localidad',
        'ocupacion',
        'provincia',
        'domicilio',
        'municipio',
        'created_at',
        'updated_at',
        'deleted_at',
        'nacimiento',
        'miembro_desde',
        'remember_token',
        'telefono_oficina',
        'apellido_materno',
        'apellido_paterno',
        'email_verified_at',
        'telefono_particular',
    ];

    public function listaDeEventos()
    {
        return $this->hasMany(ListaDeEvento::class, 'responsable_de_evento_id', 'id');
    }

    public function fichaMedicas()
    {
        return $this->hasMany(FichaMedica::class, 'miembro_id', 'id');
    }

    public function actasCeps()
    {
        return $this->hasMany(ActasCep::class, 'vobo_id', 'id');
    }

    public function actasDeCops()
    {
        return $this->hasMany(ActasDeCop::class, 'vobo_id', 'id');
    }

    public function actasCogs()
    {
        return $this->hasMany(ActasCog::class, 'vobo_id', 'id');
    }

    public function solicitudDeCambioDeGrupos()
    {
        return $this->hasMany(SolicitudDeCambioDeGrupo::class, 'persona_a_cambiar_id', 'id');
    }

    public function registroEventos()
    {
        return $this->belongsToMany(RegistroEvento::class);
    }

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

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getNacimientoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setNacimientoAttribute($value)
    {
        $this->attributes['nacimiento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getVigenciaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setVigenciaAttribute($value)
    {
        $this->attributes['vigencia'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getMiembroDesdeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMiembroDesdeAttribute($value)
    {
        $this->attributes['miembro_desde'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
