<?php

namespace App\Http\Requests;

use App\RegistroEvento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyRegistroEventoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('registro_evento_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:registro_eventos,id',
        ];
    }
}
