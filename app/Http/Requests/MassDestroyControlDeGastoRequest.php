<?php

namespace App\Http\Requests;

use App\ControlDeGasto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyControlDeGastoRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('control_de_gasto_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:control_de_gastos,id',
        ];
    }
}
