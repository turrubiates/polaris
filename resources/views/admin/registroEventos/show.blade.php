@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.registroEvento.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.registroEvento.fields.id') }}
                        </th>
                        <td>
                            {{ $registroEvento->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registroEvento.fields.evento') }}
                        </th>
                        <td>
                            {{ $registroEvento->evento->nombre_de_evento ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registroEvento.fields.grupo') }}
                        </th>
                        <td>
                            {{ $registroEvento->grupo->grupo ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Participantes Manada de Lobatos
                        </th>
                        <td>
                            @foreach($registroEvento->participantes as $id => $participantes)
                                <span class="label label-info label-many">{{ $participantes->cum }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registroEvento.fields.comprobante_de_pago') }}
                        </th>
                        <td>
                            @foreach($registroEvento->comprobante_de_pago as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
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