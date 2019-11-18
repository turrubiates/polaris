<?php

namespace App\Http\Requests;

use App\EtiquetasAcuerdosDeProvincium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreEtiquetasAcuerdosDeProvinciumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('etiquetas_acuerdos_de_provincium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'etiqueta_acuerdo_de_provincia' => [
                'required',
            ],
        ];
    }
}
