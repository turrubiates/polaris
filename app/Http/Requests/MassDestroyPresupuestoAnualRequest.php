<?php

namespace App\Http\Requests;

use App\PresupuestoAnual;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPresupuestoAnualRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('presupuesto_anual_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:presupuesto_anuals,id',
        ];
    }
}
