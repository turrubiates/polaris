<?php

namespace App\Http\Requests;

use App\ListaDeEvento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyListaDeEventoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lista_de_evento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:lista_de_eventos,id',
        ];
    }
}
