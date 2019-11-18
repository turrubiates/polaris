<?php

namespace App\Http\Requests;

use App\Provincium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreProvinciumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('provincium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
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
