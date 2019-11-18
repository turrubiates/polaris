@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.solicitudDeCambioDeGrupo.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.solicitud-de-cambio-de-grupos.update", [$solicitudDeCambioDeGrupo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('fecha_de_solicitud') ? 'has-error' : '' }}">
                <label for="fecha_de_solicitud">{{ trans('cruds.solicitudDeCambioDeGrupo.fields.fecha_de_solicitud') }}*</label>
                <input type="text" id="fecha_de_solicitud" name="fecha_de_solicitud" class="form-control date" value="{{ old('fecha_de_solicitud', isset($solicitudDeCambioDeGrupo) ? $solicitudDeCambioDeGrupo->fecha_de_solicitud : '') }}" required>
                @if($errors->has('fecha_de_solicitud'))
                    <p class="help-block">
                        {{ $errors->first('fecha_de_solicitud') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.solicitudDeCambioDeGrupo.fields.fecha_de_solicitud_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('solicitante') ? 'has-error' : '' }}">
                <label for="solicitante">{{ trans('cruds.solicitudDeCambioDeGrupo.fields.solicitante') }}*</label>
                <input type="text" id="solicitante" name="solicitante" class="form-control" value="{{ old('solicitante', isset($solicitudDeCambioDeGrupo) ? $solicitudDeCambioDeGrupo->solicitante : '') }}" required>
                @if($errors->has('solicitante'))
                    <p class="help-block">
                        {{ $errors->first('solicitante') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.solicitudDeCambioDeGrupo.fields.solicitante_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('persona_a_cambiar_id') ? 'has-error' : '' }}">
                <label for="persona_a_cambiar">{{ trans('cruds.solicitudDeCambioDeGrupo.fields.persona_a_cambiar') }}*</label>
                <select name="persona_a_cambiar_id" id="persona_a_cambiar" class="form-control select2" required>
                    @foreach($persona_a_cambiars as $id => $persona_a_cambiar)
                        <option value="{{ $id }}" {{ (isset($solicitudDeCambioDeGrupo) && $solicitudDeCambioDeGrupo->persona_a_cambiar ? $solicitudDeCambioDeGrupo->persona_a_cambiar->id : old('persona_a_cambiar_id')) == $id ? 'selected' : '' }}>{{ $persona_a_cambiar }}</option>
                    @endforeach
                </select>
                @if($errors->has('persona_a_cambiar_id'))
                    <p class="help-block">
                        {{ $errors->first('persona_a_cambiar_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('grupo_saliente') ? 'has-error' : '' }}">
                <label for="grupo_saliente">{{ trans('cruds.solicitudDeCambioDeGrupo.fields.grupo_saliente') }}*</label>
                <input type="text" id="grupo_saliente" name="grupo_saliente" class="form-control" value="{{ old('grupo_saliente', isset($solicitudDeCambioDeGrupo) ? $solicitudDeCambioDeGrupo->grupo_saliente : '') }}" required>
                @if($errors->has('grupo_saliente'))
                    <p class="help-block">
                        {{ $errors->first('grupo_saliente') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.solicitudDeCambioDeGrupo.fields.grupo_saliente_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('grupo_entrante') ? 'has-error' : '' }}">
                <label for="grupo_entrante">{{ trans('cruds.solicitudDeCambioDeGrupo.fields.grupo_entrante') }}*</label>
                <input type="text" id="grupo_entrante" name="grupo_entrante" class="form-control" value="{{ old('grupo_entrante', isset($solicitudDeCambioDeGrupo) ? $solicitudDeCambioDeGrupo->grupo_entrante : '') }}" required>
                @if($errors->has('grupo_entrante'))
                    <p class="help-block">
                        {{ $errors->first('grupo_entrante') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.solicitudDeCambioDeGrupo.fields.grupo_entrante_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('observaciones_de_grupo_saliente') ? 'has-error' : '' }}">
                <label for="observaciones_de_grupo_saliente">{{ trans('cruds.solicitudDeCambioDeGrupo.fields.observaciones_de_grupo_saliente') }}</label>
                <input type="text" id="observaciones_de_grupo_saliente" name="observaciones_de_grupo_saliente" class="form-control" value="{{ old('observaciones_de_grupo_saliente', isset($solicitudDeCambioDeGrupo) ? $solicitudDeCambioDeGrupo->observaciones_de_grupo_saliente : '') }}">
                @if($errors->has('observaciones_de_grupo_saliente'))
                    <p class="help-block">
                        {{ $errors->first('observaciones_de_grupo_saliente') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.solicitudDeCambioDeGrupo.fields.observaciones_de_grupo_saliente_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fecha_de_cambio') ? 'has-error' : '' }}">
                <label for="fecha_de_cambio">{{ trans('cruds.solicitudDeCambioDeGrupo.fields.fecha_de_cambio') }}</label>
                <input type="text" id="fecha_de_cambio" name="fecha_de_cambio" class="form-control date" value="{{ old('fecha_de_cambio', isset($solicitudDeCambioDeGrupo) ? $solicitudDeCambioDeGrupo->fecha_de_cambio : '') }}">
                @if($errors->has('fecha_de_cambio'))
                    <p class="help-block">
                        {{ $errors->first('fecha_de_cambio') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.solicitudDeCambioDeGrupo.fields.fecha_de_cambio_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cambio_realizado_por') ? 'has-error' : '' }}">
                <label for="cambio_realizado_por">{{ trans('cruds.solicitudDeCambioDeGrupo.fields.cambio_realizado_por') }}</label>
                <input type="text" id="cambio_realizado_por" name="cambio_realizado_por" class="form-control" value="{{ old('cambio_realizado_por', isset($solicitudDeCambioDeGrupo) ? $solicitudDeCambioDeGrupo->cambio_realizado_por : '') }}">
                @if($errors->has('cambio_realizado_por'))
                    <p class="help-block">
                        {{ $errors->first('cambio_realizado_por') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.solicitudDeCambioDeGrupo.fields.cambio_realizado_por_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection