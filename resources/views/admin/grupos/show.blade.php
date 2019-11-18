@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.grupo.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.grupo.fields.id') }}
                        </th>
                        <td>
                            {{ $grupo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grupo.fields.grupo') }}
                        </th>
                        <td>
                            {{ $grupo->grupo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grupo.fields.nombre_de_grupo') }}
                        </th>
                        <td>
                            {{ $grupo->nombre_de_grupo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.grupo.fields.email') }}
                        </th>
                        <td>
                            {{ $grupo->email }}
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