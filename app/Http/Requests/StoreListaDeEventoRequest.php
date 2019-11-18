<?php

namespace App\Http\Requests;

use App\ListaDeEvento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreListaDeEventoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lista_de_evento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nombre_de_evento'         => [
                'required',
            ],
            'responsable_de_evento_id' => [
                'required',
                'integer',
            ],
            'participantes'            => [
                'required',
            ],
            'inicio_de_evento'         => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'fin_de_evento'            => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'costo'                    => [
                'required',
            ],
            'fecha_de_pago_1'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'referencia_de_pago'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nivel'                    => [
                'required',
            ],
            'fecha_de_pago_2'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_de_pago_3'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
