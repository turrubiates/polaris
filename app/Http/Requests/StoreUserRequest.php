<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'roles.*'       => [
                'integer',
            ],
            'roles'         => [
                'required',
                'array',
            ],
            'password'      => [
                'required',
            ],
            'nacimiento'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'vigencia'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'miembro_desde' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'email'         => [
                'required',
            ],
        ];
    }
}
