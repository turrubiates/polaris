<?php

namespace App\Http\Requests;

use App\SolicitudDeCambioDeGrupo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSolicitudDeCambioDeGrupoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('solicitud_de_cambio_de_grupo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'fecha_de_solicitud'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'solicitante'          => [
                'required',
            ],
            'persona_a_cambiar_id' => [
                'required',
                'integer',
            ],
            'grupo_saliente'       => [
                'required',
            ],
            'grupo_entrante'       => [
                'required',
            ],
            'fecha_de_cambio'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
