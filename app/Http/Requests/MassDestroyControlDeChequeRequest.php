<?php

namespace App\Http\Requests;

use App\ControlDeCheque;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyControlDeChequeRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('control_de_cheque_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:control_de_cheques,id',
        ];
    }
}
