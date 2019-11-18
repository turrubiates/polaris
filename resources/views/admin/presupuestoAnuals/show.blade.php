@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.presupuestoAnual.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.id') }}
                        </th>
                        <td>
                            {{ $presupuestoAnual->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.provincia') }}
                        </th>
                        <td>
                            {{ $presupuestoAnual->provincia->nomenclatura ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.periodo') }}
                        </th>
                        <td>
                            {{ $presupuestoAnual->periodo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.tipo') }}
                        </th>
                        <td>
                            {{ App\PresupuestoAnual::TIPO_RADIO[$presupuestoAnual->tipo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.partida') }}
                        </th>
                        <td>
                            {{ $presupuestoAnual->partida }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_ene') }}
                        </th>
                        <td>
                            ${{ $presupuestoAnual->presupuestado_ene }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_feb') }}
                        </th>
                        <td>
                            ${{ $presupuestoAnual->presupuestado_feb }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_mar') }}
                        </th>
                        <td>
                            ${{ $presupuestoAnual->presupuestado_mar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_abr') }}
                        </th>
                        <td>
                            ${{ $presupuestoAnual->presupuestado_abr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_may') }}
                        </th>
                        <td>
                            ${{ $presupuestoAnual->presupuestado_may }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_jun') }}
                        </th>
                        <td>
                            ${{ $presupuestoAnual->presupuestado_jun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_jul') }}
                        </th>
                        <td>
                            ${{ $presupuestoAnual->presupuestado_jul }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_ago') }}
                        </th>
                        <td>
                            ${{ $presupuestoAnual->presupuestado_ago }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_sep') }}
                        </th>
                        <td>
                            ${{ $presupuestoAnual->presupuestado_sep }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_oct') }}
                        </th>
                        <td>
                            ${{ $presupuestoAnual->presupuestado_oct }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_nov') }}
                        </th>
                        <td>
                            ${{ $presupuestoAnual->presupuestado_nov }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_dic') }}
                        </th>
                        <td>
                            ${{ $presupuestoAnual->presupuestado_dic }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection