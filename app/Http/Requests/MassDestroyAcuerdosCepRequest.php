<?php

namespace App\Http\Requests;

use App\AcuerdosCep;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAcuerdosCepRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('acuerdos_cep_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:acuerdos_ceps,id',
        ];
    }
}
