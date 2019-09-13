<?php

namespace App\Http\Requests;

use App\MovimientosBancario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyMovimientosBancarioRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('movimientos_bancario_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:movimientos_bancarios,id',
        ];
    }
}
