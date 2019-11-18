<?php

namespace App\Http\Requests;

use App\RegistroEvento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateRegistroEventoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('registro_evento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'evento_id'       => [
                'required',
                'integer',
            ],
            'grupo_id'        => [
                'required',
                'integer',
            ],
            'participantes.*' => [
                'integer',
            ],
            'participantes'   => [
                'required',
                'array',
            ],
        ];
    }
}
