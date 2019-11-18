@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.guiaDeAcm.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.guiaDeAcm.fields.id') }}
                        </th>
                        <td>
                            {{ $guiaDeAcm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guiaDeAcm.fields.cargo') }}
                        </th>
                        <td>
                            {{ $guiaDeAcm->cargo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.guiaDeAcm.fields.acm') }}
                        </th>
                        <td>
                            {!! $guiaDeAcm->acm !!}
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