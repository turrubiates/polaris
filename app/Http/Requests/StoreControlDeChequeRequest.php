<?php

namespace App\Http\Requests;

use App\ControlDeCheque;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreControlDeChequeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('control_de_cheque_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'numero_de_cheque'         => [
                'required',
            ],
            'nombre_a_quien_se_expide' => [
                'required',
            ],
            'cantidad'                 => [
                'required',
            ],
            'descripcion'              => [
                'required',
            ],
            'fecha_de_expedicion'      => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fecha_de_entrega'         => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_de_cobro'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
