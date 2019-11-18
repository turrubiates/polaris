<?php

namespace App\Http\Requests;

use App\ControlDeCheque;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyControlDeChequeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('control_de_cheque_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:control_de_cheques,id',
        ];
    }
}
