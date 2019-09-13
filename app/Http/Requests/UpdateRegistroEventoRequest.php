<?php

namespace App\Http\Requests;

use App\RegistroEvento;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRegistroEventoRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('registro_evento_edit');
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
