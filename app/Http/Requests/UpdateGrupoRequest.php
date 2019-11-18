<?php

namespace App\Http\Requests;

use App\Grupo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateGrupoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('grupo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'grupo' => [
                'required',
            ],
        ];
    }
}
