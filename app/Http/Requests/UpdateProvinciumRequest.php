<?php

namespace App\Http\Requests;

use App\Provincium;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProvinciumRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('provincium_edit');
    }

    public function rules()
    {
        return [
            'nomenclatura' => [
                'min:3',
                'max:3',
            ],
        ];
    }
}
