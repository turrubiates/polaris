@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.listaDeEvento.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.id') }}
                        </th>
                        <td>
                            {{ $listaDeEvento->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.nombre_de_evento') }}
                        </th>
                        <td>
                            {{ $listaDeEvento->nombre_de_evento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.responsable_de_evento') }}
                        </th>
                        <td>
                            {{ $listaDeEvento->responsable_de_evento->cum ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.participantes') }}
                        </th>
                        <td>
                            {{ App\ListaDeEvento::PARTICIPANTES_RADIO[$listaDeEvento->participantes] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.participantes_ml') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $listaDeEvento->participantes_ml ? "checked" : "" }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.participantes_ts') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $listaDeEvento->participantes_ts ? "checked" : "" }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.participantes_cc') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $listaDeEvento->participantes_cc ? "checked" : "" }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.participantes_cr') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $listaDeEvento->participantes_cr ? "checked" : "" }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.participantes_sd') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $listaDeEvento->participantes_sd ? "checked" : "" }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.participantes_ai') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $listaDeEvento->participantes_ai ? "checked" : "" }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.lugar_de_evento') }}
                        </th>
                        <td>
                            {{ $listaDeEvento->lugar_de_evento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.inicio_de_evento') }}
                        </th>
                        <td>
                            {{ $listaDeEvento->inicio_de_evento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.fin_de_evento') }}
                        </th>
                        <td>
                            {{ $listaDeEvento->fin_de_evento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.costo') }}
                        </th>
                        <td>
                            {{ App\ListaDeEvento::COSTO_RADIO[$listaDeEvento->costo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.fecha_de_pago_1') }}
                        </th>
                        <td>
                            {{ $listaDeEvento->fecha_de_pago_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.costo_participantes_fecha_1') }}
                        </th>
                        <td>
                            ${{ $listaDeEvento->costo_participantes_fecha_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.referencia_de_pago') }}
                        </th>
                        <td>
                            {{ $listaDeEvento->referencia_de_pago }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.nivel') }}
                        </th>
                        <td>
                            {{ App\ListaDeEvento::NIVEL_SELECT[$listaDeEvento->nivel] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.adultos_responsables') }}
                        </th>
                        <td>
                            {{ App\ListaDeEvento::ADULTOS_RESPONSABLES_SELECT[$listaDeEvento->adultos_responsables] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.staff') }}
                        </th>
                        <td>
                            {{ App\ListaDeEvento::STAFF_SELECT[$listaDeEvento->staff] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.costo_adultos_fecha_1') }}
                        </th>
                        <td>
                            ${{ $listaDeEvento->costo_adultos_fecha_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.costo_staff_fecha_1') }}
                        </th>
                        <td>
                            ${{ $listaDeEvento->costo_staff_fecha_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.fecha_de_pago_2') }}
                        </th>
                        <td>
                            {{ $listaDeEvento->fecha_de_pago_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.costo_participantes_fecha_2') }}
                        </th>
                        <td>
                            ${{ $listaDeEvento->costo_participantes_fecha_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.costo_adultos_fecha_2') }}
                        </th>
                        <td>
                            ${{ $listaDeEvento->costo_adultos_fecha_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.costo_staff_fecha_2') }}
                        </th>
                        <td>
                            ${{ $listaDeEvento->costo_staff_fecha_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.fecha_de_pago_3') }}
                        </th>
                        <td>
                            {{ $listaDeEvento->fecha_de_pago_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.costo_participantes_fecha_3') }}
                        </th>
                        <td>
                            ${{ $listaDeEvento->costo_participantes_fecha_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.costo_adultos_fecha_3') }}
                        </th>
                        <td>
                            ${{ $listaDeEvento->costo_adultos_fecha_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listaDeEvento.fields.costo_staff_fecha_3') }}
                        </th>
                        <td>
                            ${{ $listaDeEvento->costo_staff_fecha_3 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection