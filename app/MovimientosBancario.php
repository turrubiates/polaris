<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovimientosBancario extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'movimientos_bancarios';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'fecha_de_operacion',
    ];

    protected $fillable = [
        'saldo',
        'retiros',
        'team_id',
        'sucursal',
        'depositos',
        'cheque_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'descripcion',
        'referencia_id',
        'numero_de_cuenta',
        'fecha_de_operacion',
        'numero_de_movimiento',
        'codigo_de_transaccion',
        'descripcion_detallada',
    ];

    public function getFechaDeOperacionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeOperacionAttribute($value)
    {
        $this->attributes['fecha_de_operacion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function referencia()
    {
        return $this->belongsTo(ListaDeEvento::class, 'referencia_id');
    }

    public function cheque()
    {
        return $this->belongsTo(ControlDeCheque::class, 'cheque_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
