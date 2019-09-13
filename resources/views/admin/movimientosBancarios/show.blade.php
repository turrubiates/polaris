@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.movimientosBancario.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.movimientosBancario.fields.numero_de_cuenta') }}
                                    </th>
                                    <td>
                                        {{ $movimientosBancario->numero_de_cuenta }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.movimientosBancario.fields.fecha_de_operacion') }}
                                    </th>
                                    <td>
                                        {{ $movimientosBancario->fecha_de_operacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.movimientosBancario.fields.referencia') }}
                                    </th>
                                    <td>
                                        {{ $movimientosBancario->referencia->referencia_de_pago ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.movimientosBancario.fields.descripcion') }}
                                    </th>
                                    <td>
                                        {{ $movimientosBancario->descripcion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.movimientosBancario.fields.codigo_de_transaccion') }}
                                    </th>
                                    <td>
                                        {{ $movimientosBancario->codigo_de_transaccion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.movimientosBancario.fields.sucursal') }}
                                    </th>
                                    <td>
                                        {{ $movimientosBancario->sucursal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.movimientosBancario.fields.depositos') }}
                                    </th>
                                    <td>
                                        ${{ $movimientosBancario->depositos }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.movimientosBancario.fields.retiros') }}
                                    </th>
                                    <td>
                                        ${{ $movimientosBancario->retiros }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.movimientosBancario.fields.saldo') }}
                                    </th>
                                    <td>
                                        ${{ $movimientosBancario->saldo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.movimientosBancario.fields.numero_de_movimiento') }}
                                    </th>
                                    <td>
                                        {{ $movimientosBancario->numero_de_movimiento }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.movimientosBancario.fields.descripcion_detallada') }}
                                    </th>
                                    <td>
                                        {{ $movimientosBancario->descripcion_detallada }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.movimientosBancario.fields.cheque') }}
                                    </th>
                                    <td>
                                        {{ $movimientosBancario->cheque->numero_de_cheque ?? '' }}
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