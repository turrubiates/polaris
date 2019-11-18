<?php

namespace App\Http\Requests;

use App\AcuerdosCop;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAcuerdosCopRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('acuerdos_cop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:acuerdos_cops,id',
        ];
    }
}
