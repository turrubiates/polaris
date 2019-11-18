<?php

namespace App\Http\Requests;

use App\SolicitudDeCambioDeGrupo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySolicitudDeCambioDeGrupoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('solicitud_de_cambio_de_grupo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:solicitud_de_cambio_de_grupos,id',
        ];
    }
}
