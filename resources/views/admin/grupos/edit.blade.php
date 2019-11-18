@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.grupo.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.grupos.update", [$grupo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('grupo') ? 'has-error' : '' }}">
                <label for="grupo">{{ trans('cruds.grupo.fields.grupo') }}*</label>
                <input type="text" id="grupo" name="grupo" class="form-control" value="{{ old('grupo', isset($grupo) ? $grupo->grupo : '') }}" required>
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
                <input type="text" id="nombre_de_grupo" name="nombre_de_grupo" class="form-control" value="{{ old('nombre_de_grupo', isset($grupo) ? $grupo->nombre_de_grupo : '') }}">
                @if($errors->has('nombre_de_grupo'))
                    <p class="help-block">
                        {{ $errors->first('nombre_de_grupo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.grupo.fields.nombre_de_grupo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.grupo.fields.email') }}</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($grupo) ? $grupo->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.grupo.fields.email_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection