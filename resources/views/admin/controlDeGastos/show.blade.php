@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.controlDeGasto.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.controlDeGasto.fields.id') }}
                        </th>
                        <td>
                            {{ $controlDeGasto->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.controlDeGasto.fields.cheque') }}
                        </th>
                        <td>
                            {{ $controlDeGasto->cheque->numero_de_cheque ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.controlDeGasto.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $controlDeGasto->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.controlDeGasto.fields.total') }}
                        </th>
                        <td>
                            ${{ $controlDeGasto->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.controlDeGasto.fields.iva') }}
                        </th>
                        <td>
                            ${{ $controlDeGasto->iva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.controlDeGasto.fields.notas') }}
                        </th>
                        <td>
                            {{ $controlDeGasto->notas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.controlDeGasto.fields.folio_fiscal') }}
                        </th>
                        <td>
                            {{ $controlDeGasto->folio_fiscal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.controlDeGasto.fields.pdf') }}
                        </th>
                        <td>
                            {{ $controlDeGasto->pdf }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.controlDeGasto.fields.xml') }}
                        </th>
                        <td>
                            {{ $controlDeGasto->xml }}
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