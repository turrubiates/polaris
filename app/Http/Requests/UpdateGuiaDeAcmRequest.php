<?php

namespace App\Http\Requests;

use App\GuiaDeAcm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateGuiaDeAcmRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guia_de_acm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'cargo' => [
                'required',
            ],
        ];
    }
}
