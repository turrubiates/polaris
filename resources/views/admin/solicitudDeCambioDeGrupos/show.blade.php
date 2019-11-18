@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.solicitudDeCambioDeGrupo.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitudDeCambioDeGrupo.fields.id') }}
                        </th>
                        <td>
                            {{ $solicitudDeCambioDeGrupo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitudDeCambioDeGrupo.fields.fecha_de_solicitud') }}
                        </th>
                        <td>
                            {{ $solicitudDeCambioDeGrupo->fecha_de_solicitud }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitudDeCambioDeGrupo.fields.solicitante') }}
                        </th>
                        <td>
                            {{ $solicitudDeCambioDeGrupo->solicitante }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitudDeCambioDeGrupo.fields.persona_a_cambiar') }}
                        </th>
                        <td>
                            {{ $solicitudDeCambioDeGrupo->persona_a_cambiar->cum ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitudDeCambioDeGrupo.fields.grupo_saliente') }}
                        </th>
                        <td>
                            {{ $solicitudDeCambioDeGrupo->grupo_saliente }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitudDeCambioDeGrupo.fields.grupo_entrante') }}
                        </th>
                        <td>
                            {{ $solicitudDeCambioDeGrupo->grupo_entrante }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitudDeCambioDeGrupo.fields.observaciones_de_grupo_saliente') }}
                        </th>
                        <td>
                            {{ $solicitudDeCambioDeGrupo->observaciones_de_grupo_saliente }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitudDeCambioDeGrupo.fields.fecha_de_cambio') }}
                        </th>
                        <td>
                            {{ $solicitudDeCambioDeGrupo->fecha_de_cambio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitudDeCambioDeGrupo.fields.cambio_realizado_por') }}
                        </th>
                        <td>
                            {{ $solicitudDeCambioDeGrupo->cambio_realizado_por }}
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