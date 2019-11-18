<?php

namespace App\Http\Requests;

use App\FichaMedica;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreFichaMedicaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ficha_medica_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'miembro_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
