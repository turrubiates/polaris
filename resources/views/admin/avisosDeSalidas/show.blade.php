@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.avisosDeSalida.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.avisosDeSalida.fields.evento') }}
                                    </th>
                                    <td>
                                        {{ $avisosDeSalida->evento->nombre_de_evento ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Participantes
                                    </th>
                                    <td>
                                        @foreach($avisosDeSalida->participantes as $id => $participantes)
                                            <span class="label label-info label-many">{{ $participantes->cum }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.avisosDeSalida.fields.grupo') }}
                                    </th>
                                    <td>
                                        {{ $avisosDeSalida->grupo->grupo ?? '' }}
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

        </div>
    </div>
</div>
@endsection