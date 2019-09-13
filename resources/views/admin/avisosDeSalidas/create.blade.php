@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.avisosDeSalida.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.avisos-de-salidas.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('evento_id') ? 'has-error' : '' }}">
                            <label for="evento">{{ trans('cruds.avisosDeSalida.fields.evento') }}*</label>
                            <select name="evento_id" id="evento" class="form-control select2" required>
                                @foreach($eventos as $id => $evento)
                                    <option value="{{ $id }}" {{ (isset($avisosDeSalida) && $avisosDeSalida->evento ? $avisosDeSalida->evento->id : old('evento_id')) == $id ? 'selected' : '' }}>{{ $evento }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('evento_id'))
                                <p class="help-block">
                                    {{ $errors->first('evento_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('participantes') ? 'has-error' : '' }}">
                            <label for="participantes">{{ trans('cruds.avisosDeSalida.fields.participantes') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="participantes[]" id="participantes" class="form-control select2" multiple="multiple" required>
                                @foreach($participantes as $id => $participantes)
                                    <option value="{{ $id }}" {{ (in_array($id, old('participantes', [])) || isset($avisosDeSalida) && $avisosDeSalida->participantes->contains($id)) ? 'selected' : '' }}>{{ $participantes }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('participantes'))
                                <p class="help-block">
                                    {{ $errors->first('participantes') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.avisosDeSalida.fields.participantes_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('grupo_id') ? 'has-error' : '' }}">
                            <label for="grupo">{{ trans('cruds.avisosDeSalida.fields.grupo') }}*</label>
                            <select name="grupo_id" id="grupo" class="form-control select2" required>
                                @foreach($grupos as $id => $grupo)
                                    <option value="{{ $id }}" {{ (isset($avisosDeSalida) && $avisosDeSalida->grupo ? $avisosDeSalida->grupo->id : old('grupo_id')) == $id ? 'selected' : '' }}>{{ $grupo }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('grupo_id'))
                                <p class="help-block">
                                    {{ $errors->first('grupo_id') }}
                                </p>
                            @endif
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