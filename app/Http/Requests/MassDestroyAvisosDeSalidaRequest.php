<?php

namespace App\Http\Requests;

use App\AvisosDeSalida;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyAvisosDeSalidaRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('avisos_de_salida_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:avisos_de_salidas,id',
        ];
    }
}
