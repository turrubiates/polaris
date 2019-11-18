<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
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
            'cum'           => [
                'min:10',
                'max:10',
                'required',
                'unique:users,cum,' . request()->route('user')->id,
            ],
            'curp'          => [
                'min:18',
                'max:18',
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
        ];
    }
}
