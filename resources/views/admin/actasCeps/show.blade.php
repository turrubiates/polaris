@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.actasCep.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.id') }}
                        </th>
                        <td>
                            {{ $actasCep->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.team') }}
                        </th>
                        <td>
                            {{ $actasCep->team->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.numero_de_acta') }}
                        </th>
                        <td>
                            {{ $actasCep->numero_de_acta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.fecha_de_convocatoria') }}
                        </th>
                        <td>
                            {{ $actasCep->fecha_de_convocatoria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.provincia') }}
                        </th>
                        <td>
                            {{ $actasCep->provincia->nomenclatura ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.lugar') }}
                        </th>
                        <td>
                            {{ $actasCep->lugar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.orden_del_dia') }}
                        </th>
                        <td>
                            {!! $actasCep->orden_del_dia !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.fecha_de_acta') }}
                        </th>
                        <td>
                            {{ $actasCep->fecha_de_acta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.hora_inicio') }}
                        </th>
                        <td>
                            {{ $actasCep->hora_inicio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.hora_fin') }}
                        </th>
                        <td>
                            {{ $actasCep->hora_fin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.relatoria') }}
                        </th>
                        <td>
                            {!! $actasCep->relatoria !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Asistentes
                        </th>
                        <td>
                            @foreach($actasCep->asistentes as $id => $asistentes)
                                <span class="label label-info label-many">{{ $asistentes->cum }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.imagen_de_acta') }}
                        </th>
                        <td>
                            {{ $actasCep->imagen_de_acta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.vobo') }}
                        </th>
                        <td>
                            {{ $actasCep->vobo->cum ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.observaciones') }}
                        </th>
                        <td>
                            {!! $actasCep->observaciones !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasCep.fields.finished_at') }}
                        </th>
                        <td>
                            {{ $actasCep->finished_at }}
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