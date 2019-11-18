<?php

namespace App\Http\Requests;

use App\ControlDeGasto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreControlDeGastoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('control_de_gasto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'descripcion' => [
                'required',
            ],
            'total'       => [
                'required',
            ],
        ];
    }
}
