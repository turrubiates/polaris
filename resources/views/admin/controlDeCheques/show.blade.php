@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.controlDeCheque.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlDeCheque.fields.numero_de_cheque') }}
                                    </th>
                                    <td>
                                        {{ $controlDeCheque->numero_de_cheque }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlDeCheque.fields.nombre_a_quien_se_expide') }}
                                    </th>
                                    <td>
                                        {{ $controlDeCheque->nombre_a_quien_se_expide }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlDeCheque.fields.cantidad') }}
                                    </th>
                                    <td>
                                        ${{ $controlDeCheque->cantidad }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlDeCheque.fields.descripcion') }}
                                    </th>
                                    <td>
                                        {{ $controlDeCheque->descripcion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlDeCheque.fields.fecha_de_expedicion') }}
                                    </th>
                                    <td>
                                        {{ $controlDeCheque->fecha_de_expedicion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlDeCheque.fields.fecha_de_entrega') }}
                                    </th>
                                    <td>
                                        {{ $controlDeCheque->fecha_de_entrega }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlDeCheque.fields.nombre_a_quien_se_entrego') }}
                                    </th>
                                    <td>
                                        {{ $controlDeCheque->nombre_a_quien_se_entrego }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlDeCheque.fields.fecha_de_cobro') }}
                                    </th>
                                    <td>
                                        {{ $controlDeCheque->fecha_de_cobro }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlDeCheque.fields.imagen_de_poliza') }}
                                    </th>
                                    <td>
                                        {{ $controlDeCheque->imagen_de_poliza }}
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