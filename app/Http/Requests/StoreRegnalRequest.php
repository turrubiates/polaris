<?php

namespace App\Http\Requests;

use App\Regnal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreRegnalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('regnal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
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
