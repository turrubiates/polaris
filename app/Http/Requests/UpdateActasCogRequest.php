<?php

namespace App\Http\Requests;

use App\ActasCog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateActasCogRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('actas_cog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'fecha_de_convocatoria' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_de_acta'         => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'hora_inicio'           => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'hora_fin'              => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'asistentes.*'          => [
                'integer',
            ],
            'asistentes'            => [
                'array',
            ],
        ];
    }
}