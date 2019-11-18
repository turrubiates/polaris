@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fichaMedica.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fichaMedica.fields.id') }}
                        </th>
                        <td>
                            {{ $fichaMedica->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fichaMedica.fields.miembro') }}
                        </th>
                        <td>
                            {{ $fichaMedica->miembro->cum ?? '' }}
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