<?php

namespace App\Http\Requests;

use App\ActasCog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyActasCogRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('actas_cog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:actas_cogs,id',
        ];
    }
}
