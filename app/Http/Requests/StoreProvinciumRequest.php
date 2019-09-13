<?php

namespace App\Http\Requests;

use App\Provincium;
use Illuminate\Foundation\Http\FormRequest;

class StoreProvinciumRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('provincium_create');
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
