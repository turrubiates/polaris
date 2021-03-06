@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.provincium.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.provincia.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nomenclatura') ? 'has-error' : '' }}">
                            <label for="nomenclatura">{{ trans('cruds.provincium.fields.nomenclatura') }}</label>
                            <input type="text" id="nomenclatura" name="nomenclatura" class="form-control" value="{{ old('nomenclatura', isset($provincium) ? $provincium->nomenclatura : '0') }}">
                            @if($errors->has('nomenclatura'))
                                <p class="help-block">
                                    {{ $errors->first('nomenclatura') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.provincium.fields.nomenclatura_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label for="nombre">{{ trans('cruds.provincium.fields.nombre') }}</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($provincium) ? $provincium->nombre : '0') }}">
                            @if($errors->has('nombre'))
                                <p class="help-block">
                                    {{ $errors->first('nombre') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.provincium.fields.nombre_helper') }}
                            </p>
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection