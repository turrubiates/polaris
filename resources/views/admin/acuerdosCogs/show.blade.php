@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.acuerdosCog.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.acuerdosCog.fields.id') }}
                        </th>
                        <td>
                            {{ $acuerdosCog->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acuerdosCog.fields.fecha') }}
                        </th>
                        <td>
                            {{ $acuerdosCog->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acuerdosCog.fields.provincia') }}
                        </th>
                        <td>
                            {{ $acuerdosCog->provincia->nomenclatura ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acuerdosCog.fields.numero_de_acuerdo') }}
                        </th>
                        <td>
                            {{ $acuerdosCog->numero_de_acuerdo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acuerdosCog.fields.descripcion_de_acuerdo') }}
                        </th>
                        <td>
                            {{ $acuerdosCog->descripcion_de_acuerdo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Votos A Favor
                        </th>
                        <td>
                            @foreach($acuerdosCog->votos_a_favors as $id => $votos_a_favor)
                                <span class="label label-info label-many">{{ $votos_a_favor->cum }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Etiquetas
                        </th>
                        <td>
                            @foreach($acuerdosCog->etiquetas as $id => $etiquetas)
                                <span class="label label-info label-many">{{ $etiquetas->etiqueta_acuerdo_de_provincia }}</span>
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