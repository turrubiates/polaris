<?php

namespace App\Http\Requests;

use App\AvisosDeSalida;
use Illuminate\Foundation\Http\FormRequest;

class StoreAvisosDeSalidaRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('avisos_de_salida_create');
    }

    public function rules()
    {
        return [
            'evento_id'       => [
                'required',
                'integer',
            ],
            'participantes.*' => [
                'integer',
            ],
            'participantes'   => [
                'required',
                'array',
            ],
            'grupo_id'        => [
                'required',
                'integer',
            ],
        ];
    }
}
