@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.actasCog.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.id') }}
                        </th>
                        <td>
                            {{ $actasCog->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.team') }}
                        </th>
                        <td>
                            {{ $actasCog->team->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.numero_de_acta') }}
                        </th>
                        <td>
                            {{ $actasCog->numero_de_acta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.fecha_de_convocatoria') }}
                        </th>
                        <td>
                            {{ $actasCog->fecha_de_convocatoria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.provincia') }}
                        </th>
                        <td>
                            {{ $actasCog->provincia->nomenclatura ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.grupo') }}
                        </th>
                        <td>
                            {{ $actasCog->grupo->grupo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.lugar') }}
                        </th>
                        <td>
                            {{ $actasCog->lugar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.orden_del_dia') }}
                        </th>
                        <td>
                            {!! $actasCog->orden_del_dia !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.fecha_de_acta') }}
                        </th>
                        <td>
                            {{ $actasCog->fecha_de_acta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.hora_inicio') }}
                        </th>
                        <td>
                            {{ $actasCog->hora_inicio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.hora_fin') }}
                        </th>
                        <td>
                            {{ $actasCog->hora_fin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.relatoria') }}
                        </th>
                        <td>
                            {!! $actasCog->relatoria !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Asistentes
                        </th>
                        <td>
                            @foreach($actasCog->asistentes as $id => $asistentes)
                                <span class="label label-info label-many">{{ $asistentes->cum }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.imagen_de_acta') }}
                        </th>
                        <td>
                            {{ $actasCog->imagen_de_acta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.vobo') }}
                        </th>
                        <td>
                            {{ $actasCog->vobo->cum ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCog.fields.observaciones') }}
                        </th>
                        <td>
                            {!! $actasCog->observaciones !!}
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