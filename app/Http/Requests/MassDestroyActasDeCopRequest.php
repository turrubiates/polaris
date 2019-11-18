<?php

namespace App\Http\Requests;

use App\ActasDeCop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyActasDeCopRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('actas_de_cop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:actas_de_cops,id',
        ];
    }
}
