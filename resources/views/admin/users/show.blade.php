@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.user.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        Roles
                                    </th>
                                    <td>
                                        @foreach($user->roles as $id => $roles)
                                            <span class="label label-info label-many">{{ $roles->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.team') }}
                                    </th>
                                    <td>
                                        {{ $user->team->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.cum') }}
                                    </th>
                                    <td>
                                        {{ $user->cum }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.curp') }}
                                    </th>
                                    <td>
                                        {{ $user->curp }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $user->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.apellido_paterno') }}
                                    </th>
                                    <td>
                                        {{ $user->apellido_paterno }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.apellido_materno') }}
                                    </th>
                                    <td>
                                        {{ $user->apellido_materno }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.sexo') }}
                                    </th>
                                    <td>
                                        {{ $user->sexo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.nacimiento') }}
                                    </th>
                                    <td>
                                        {{ $user->nacimiento }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.vigencia') }}
                                    </th>
                                    <td>
                                        {{ $user->vigencia }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.miembro_desde') }}
                                    </th>
                                    <td>
                                        {{ $user->miembro_desde }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.ocupacion') }}
                                    </th>
                                    <td>
                                        {{ $user->ocupacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.telefono_particular') }}
                                    </th>
                                    <td>
                                        {{ $user->telefono_particular }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.telefono_oficina') }}
                                    </th>
                                    <td>
                                        {{ $user->telefono_oficina }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.domicilio') }}
                                    </th>
                                    <td>
                                        {{ $user->domicilio }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.colonia') }}
                                    </th>
                                    <td>
                                        {{ $user->colonia }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.municipio') }}
                                    </th>
                                    <td>
                                        {{ $user->municipio }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.estado') }}
                                    </th>
                                    <td>
                                        {{ $user->estado }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.provincia') }}
                                    </th>
                                    <td>
                                        {{ $user->provincia }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.distrito') }}
                                    </th>
                                    <td>
                                        {{ $user->distrito }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.grupo') }}
                                    </th>
                                    <td>
                                        {{ $user->grupo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.localidad') }}
                                    </th>
                                    <td>
                                        {{ $user->localidad }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.seccion') }}
                                    </th>
                                    <td>
                                        {{ $user->seccion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.religion') }}
                                    </th>
                                    <td>
                                        {{ $user->religion }}
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