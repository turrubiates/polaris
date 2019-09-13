<?php

namespace App\Http\Requests;

use App\ControlDeGasto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateControlDeGastoRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('control_de_gasto_edit');
    }

    public function rules()
    {
        return [
            'descripcion' => [
                'required',
            ],
            'total'       => [
                'required',
            ],
        ];
    }
}
