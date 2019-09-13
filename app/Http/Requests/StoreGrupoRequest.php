<?php

namespace App\Http\Requests;

use App\Grupo;
use Illuminate\Foundation\Http\FormRequest;

class StoreGrupoRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('grupo_create');
    }

    public function rules()
    {
        return [
            'provincia_id' => [
                'required',
                'integer',
            ],
            'grupo'        => [
                'required',
            ],
        ];
    }
}
