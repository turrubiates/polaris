<?php

namespace App\Http\Requests;

use App\RegistroEvento;
use Illuminate\Foundation\Http\FormRequest;

class StoreRegistroEventoRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('registro_evento_create');
    }

    public function rules()
    {
        return [
            'evento_id'           => [
                'required',
                'integer',
            ],
            'grupo_id'            => [
                'required',
                'integer',
            ],
            'participantes_mls.*' => [
                'integer',
            ],
            'participantes_mls'   => [
                'array',
            ],
        ];
    }
}
