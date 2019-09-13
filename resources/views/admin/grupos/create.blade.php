@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.grupo.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.grupos.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('provincia_id') ? 'has-error' : '' }}">
                            <label for="provincia">{{ trans('cruds.grupo.fields.provincia') }}*</label>
                            <select name="provincia_id" id="provincia" class="form-control select2" required>
                                @foreach($provincias as $id => $provincia)
                                    <option value="{{ $id }}" {{ (isset($grupo) && $grupo->provincia ? $grupo->provincia->id : old('provincia_id')) == $id ? 'selected' : '' }}>{{ $provincia }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('provincia_id'))
                                <p class="help-block">
                                    {{ $errors->first('provincia_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('grupo') ? 'has-error' : '' }}">
                            <label for="grupo">{{ trans('cruds.grupo.fields.grupo') }}*</label>
                            <input type="text" id="grupo" name="grupo" class="form-control" value="{{ old('grupo', isset($grupo) ? $grupo->grupo : '0') }}" required>
                            @if($errors->has('grupo'))
                                <p class="help-block">
                                    {{ $errors->first('grupo') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.grupo.fields.grupo_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('nombre_de_grupo') ? 'has-error' : '' }}">
                            <label for="nombre_de_grupo">{{ trans('cruds.grupo.fields.nombre_de_grupo') }}</label>
                            <input type="text" id="nombre_de_grupo" name="nombre_de_grupo" class="form-control" value="{{ old('nombre_de_grupo', isset($grupo) ? $grupo->nombre_de_grupo : '0') }}">
                            @if($errors->has('nombre_de_grupo'))
                                <p class="help-block">
                                    {{ $errors->first('nombre_de_grupo') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.grupo.fields.nombre_de_grupo_helper') }}
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