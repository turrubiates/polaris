<?php

namespace App\Http\Requests;

use App\MovimientosBancario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMovimientosBancarioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('movimientos_bancario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:movimientos_bancarios,id',
        ];
    }
}
