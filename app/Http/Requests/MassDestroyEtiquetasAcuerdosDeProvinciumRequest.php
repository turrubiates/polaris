<?php

namespace App\Http\Requests;

use App\EtiquetasAcuerdosDeProvincium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEtiquetasAcuerdosDeProvinciumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('etiquetas_acuerdos_de_provincium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:etiquetas_acuerdos_de_provincia,id',
        ];
    }
}
