@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.regnal.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.id') }}
                        </th>
                        <td>
                            {{ $regnal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.cum') }}
                        </th>
                        <td>
                            {{ $regnal->cum }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.curp') }}
                        </th>
                        <td>
                            {{ $regnal->curp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.nombre') }}
                        </th>
                        <td>
                            {{ $regnal->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.apellido_paterno') }}
                        </th>
                        <td>
                            {{ $regnal->apellido_paterno }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.apellido_materno') }}
                        </th>
                        <td>
                            {{ $regnal->apellido_materno }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.nacimiento') }}
                        </th>
                        <td>
                            {{ $regnal->nacimiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.vigencia') }}
                        </th>
                        <td>
                            {{ $regnal->vigencia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.sexo') }}
                        </th>
                        <td>
                            {{ $regnal->sexo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.ocupacion') }}
                        </th>
                        <td>
                            {{ $regnal->ocupacion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.email') }}
                        </th>
                        <td>
                            {{ $regnal->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.telefono_particular') }}
                        </th>
                        <td>
                            {{ $regnal->telefono_particular }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.telefono_oficina') }}
                        </th>
                        <td>
                            {{ $regnal->telefono_oficina }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.domicilio') }}
                        </th>
                        <td>
                            {{ $regnal->domicilio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.colonia') }}
                        </th>
                        <td>
                            {{ $regnal->colonia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.municipio') }}
                        </th>
                        <td>
                            {{ $regnal->municipio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.estado') }}
                        </th>
                        <td>
                            {{ $regnal->estado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.miembro_desde') }}
                        </th>
                        <td>
                            {{ $regnal->miembro_desde }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.provincia') }}
                        </th>
                        <td>
                            {{ $regnal->provincia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.distrito') }}
                        </th>
                        <td>
                            {{ $regnal->distrito }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.grupo') }}
                        </th>
                        <td>
                            {{ $regnal->grupo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.localidad') }}
                        </th>
                        <td>
                            {{ $regnal->localidad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.seccion') }}
                        </th>
                        <td>
                            {{ $regnal->seccion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.cargo') }}
                        </th>
                        <td>
                            {{ $regnal->cargo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.regnal.fields.religion') }}
                        </th>
                        <td>
                            {{ $regnal->religion }}
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