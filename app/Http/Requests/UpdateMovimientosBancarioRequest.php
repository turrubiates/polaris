<?php

namespace App\Http\Requests;

use App\MovimientosBancario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateMovimientosBancarioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('movimientos_bancario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'numero_de_cuenta'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'fecha_de_operacion'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'referencia'           => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sucursal'             => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'numero_de_movimiento' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
