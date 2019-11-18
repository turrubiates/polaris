@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.actasDeCop.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.id') }}
                        </th>
                        <td>
                            {{ $actasDeCop->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.team') }}
                        </th>
                        <td>
                            {{ $actasDeCop->team->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.numero_de_acta') }}
                        </th>
                        <td>
                            {{ $actasDeCop->numero_de_acta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.fecha_de_convocatoria') }}
                        </th>
                        <td>
                            {{ $actasDeCop->fecha_de_convocatoria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.provincia') }}
                        </th>
                        <td>
                            {{ $actasDeCop->provincia->nomenclatura ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.lugar') }}
                        </th>
                        <td>
                            {{ $actasDeCop->lugar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.orden_del_dia') }}
                        </th>
                        <td>
                            {!! $actasDeCop->orden_del_dia !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.fecha_de_acta') }}
                        </th>
                        <td>
                            {{ $actasDeCop->fecha_de_acta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.hora_inicio') }}
                        </th>
                        <td>
                            {{ $actasDeCop->hora_inicio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.hora_fin') }}
                        </th>
                        <td>
                            {{ $actasDeCop->hora_fin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.relatoria') }}
                        </th>
                        <td>
                            {!! $actasDeCop->relatoria !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Asistentes
                        </th>
                        <td>
                            @foreach($actasDeCop->asistentes as $id => $asistentes)
                                <span class="label label-info label-many">{{ $asistentes->cum }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.imagen_de_acta') }}
                        </th>
                        <td>
                            {{ $actasDeCop->imagen_de_acta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.vobo') }}
                        </th>
                        <td>
                            {{ $actasDeCop->vobo->cum ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actasDeCop.fields.observaciones') }}
                        </th>
                        <td>
                            {!! $actasDeCop->observaciones !!}
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