<?php

namespace App\Http\Requests;

use App\ListaDeEvento;
use Illuminate\Foundation\Http\FormRequest;

class StoreListaDeEventoRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lista_de_evento_create');
    }

    public function rules()
    {
        return [
            'nombre_de_evento'         => [
                'required',
            ],
            'nivel'                    => [
                'required',
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
            'responsable_de_evento_id' => [
                'required',
                'integer',
            ],
            'costo'                    => [
                'required',
            ],
            'referencia_de_pago'       => [
                'digits_between:0,10',
            ],
            'fecha_de_pago_1'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
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
