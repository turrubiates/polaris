<?php

namespace App\Http\Requests;

use App\AcuerdosCep;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAcuerdosCepRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('acuerdos_cep_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'fecha'                  => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'provincia_id'           => [
                'required',
                'integer',
            ],
            'descripcion_de_acuerdo' => [
                'required',
            ],
            'votos_a_favors.*'       => [
                'integer',
            ],
            'votos_a_favors'         => [
                'required',
                'array',
            ],
            'etiquetas.*'            => [
                'integer',
            ],
            'etiquetas'              => [
                'array',
            ],
        ];
    }
}
