<?php

namespace App\Http\Requests;

use App\PresupuestoAnual;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePresupuestoAnualRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('presupuesto_anual_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'provincia_id' => [
                'required',
                'integer',
            ],
            'periodo'      => [
                'min:4',
                'max:4',
                'required',
            ],
            'partida'      => [
                'required',
            ],
        ];
    }
}
