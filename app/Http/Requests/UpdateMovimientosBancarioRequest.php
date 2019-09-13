<?php

namespace App\Http\Requests;

use App\MovimientosBancario;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMovimientosBancarioRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('movimientos_bancario_edit');
    }

    public function rules()
    {
        return [
            'numero_de_cuenta'     => [
                'required',
            ],
            'fecha_de_operacion'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'numero_de_movimiento' => [
                'required',
            ],
        ];
    }
}
