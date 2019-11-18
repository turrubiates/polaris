<?php

namespace App\Http\Requests;

use App\AcuerdosCog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAcuerdosCogRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('acuerdos_cog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:acuerdos_cogs,id',
        ];
    }
}
