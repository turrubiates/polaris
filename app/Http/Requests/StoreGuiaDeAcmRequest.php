<?php

namespace App\Http\Requests;

use App\GuiaDeAcm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreGuiaDeAcmRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('guia_de_acm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
