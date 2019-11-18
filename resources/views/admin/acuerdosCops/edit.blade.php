@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.acuerdosCop.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.acuerdos-cops.update", [$acuerdosCop->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('team_id') ? 'has-error' : '' }}">
                <label for="team">{{ trans('cruds.acuerdosCop.fields.team') }}</label>
                <select name="team_id" id="team" class="form-control select2">
                    @foreach($teams as $id => $team)
                        <option value="{{ $id }}" {{ (isset($acuerdosCop) && $acuerdosCop->team ? $acuerdosCop->team->id : old('team_id')) == $id ? 'selected' : '' }}>{{ $team }}</option>
                    @endforeach
                </select>
                @if($errors->has('team_id'))
                    <p class="help-block">
                        {{ $errors->first('team_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                <label for="fecha">{{ trans('cruds.acuerdosCop.fields.fecha') }}*</label>
                <input type="text" id="fecha" name="fecha" class="form-control date" value="{{ old('fecha', isset($acuerdosCop) ? $acuerdosCop->fecha : '') }}" required>
                @if($errors->has('fecha'))
                    <p class="help-block">
                        {{ $errors->first('fecha') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.acuerdosCop.fields.fecha_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('provincia_id') ? 'has-error' : '' }}">
                <label for="provincia">{{ trans('cruds.acuerdosCop.fields.provincia') }}*</label>
                <select name="provincia_id" id="provincia" class="form-control select2" required>
                    @foreach($provincias as $id => $provincia)
                        <option value="{{ $id }}" {{ (isset($acuerdosCop) && $acuerdosCop->provincia ? $acuerdosCop->provincia->id : old('provincia_id')) == $id ? 'selected' : '' }}>{{ $provincia }}</option>
                    @endforeach
                </select>
                @if($errors->has('provincia_id'))
                    <p class="help-block">
                        {{ $errors->first('provincia_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('numero_de_acuerdo') ? 'has-error' : '' }}">
                <label for="numero_de_acuerdo">{{ trans('cruds.acuerdosCop.fields.numero_de_acuerdo') }}</label>
                <input type="text" id="numero_de_acuerdo" name="numero_de_acuerdo" class="form-control" value="{{ old('numero_de_acuerdo', isset($acuerdosCop) ? $acuerdosCop->numero_de_acuerdo : '') }}">
                @if($errors->has('numero_de_acuerdo'))
                    <p class="help-block">
                        {{ $errors->first('numero_de_acuerdo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.acuerdosCop.fields.numero_de_acuerdo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('descripcion_de_acuerdo') ? 'has-error' : '' }}">
                <label for="descripcion_de_acuerdo">{{ trans('cruds.acuerdosCop.fields.descripcion_de_acuerdo') }}*</label>
                <input type="text" id="descripcion_de_acuerdo" name="descripcion_de_acuerdo" class="form-control" value="{{ old('descripcion_de_acuerdo', isset($acuerdosCop) ? $acuerdosCop->descripcion_de_acuerdo : '') }}" required>
                @if($errors->has('descripcion_de_acuerdo'))
                    <p class="help-block">
                        {{ $errors->first('descripcion_de_acuerdo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.acuerdosCop.fields.descripcion_de_acuerdo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('votos_a_favors') ? 'has-error' : '' }}">
                <label for="votos_a_favor">{{ trans('cruds.acuerdosCop.fields.votos_a_favor') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="votos_a_favors[]" id="votos_a_favors" class="form-control select2" multiple="multiple" required>
                    @foreach($votos_a_favors as $id => $votos_a_favor)
                        <option value="{{ $id }}" {{ (in_array($id, old('votos_a_favors', [])) || isset($acuerdosCop) && $acuerdosCop->votos_a_favors->contains($id)) ? 'selected' : '' }}>{{ $votos_a_favor }}</option>
                    @endforeach
                </select>
                @if($errors->has('votos_a_favors'))
                    <p class="help-block">
                        {{ $errors->first('votos_a_favors') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.acuerdosCop.fields.votos_a_favor_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('etiquetas') ? 'has-error' : '' }}">
                <label for="etiquetas">{{ trans('cruds.acuerdosCop.fields.etiquetas') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="etiquetas[]" id="etiquetas" class="form-control select2" multiple="multiple">
                    @foreach($etiquetas as $id => $etiquetas)
                        <option value="{{ $id }}" {{ (in_array($id, old('etiquetas', [])) || isset($acuerdosCop) && $acuerdosCop->etiquetas->contains($id)) ? 'selected' : '' }}>{{ $etiquetas }}</option>
                    @endforeach
                </select>
                @if($errors->has('etiquetas'))
                    <p class="help-block">
                        {{ $errors->first('etiquetas') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.acuerdosCop.fields.etiquetas_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection