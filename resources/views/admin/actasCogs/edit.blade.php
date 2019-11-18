@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.actasCog.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.actas-cogs.update", [$actasCog->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('team_id') ? 'has-error' : '' }}">
                <label for="team">{{ trans('cruds.actasCog.fields.team') }}</label>
                <select name="team_id" id="team" class="form-control select2">
                    @foreach($teams as $id => $team)
                        <option value="{{ $id }}" {{ (isset($actasCog) && $actasCog->team ? $actasCog->team->id : old('team_id')) == $id ? 'selected' : '' }}>{{ $team }}</option>
                    @endforeach
                </select>
                @if($errors->has('team_id'))
                    <p class="help-block">
                        {{ $errors->first('team_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('numero_de_acta') ? 'has-error' : '' }}">
                <label for="numero_de_acta">{{ trans('cruds.actasCog.fields.numero_de_acta') }}</label>
                <input type="text" id="numero_de_acta" name="numero_de_acta" class="form-control" value="{{ old('numero_de_acta', isset($actasCog) ? $actasCog->numero_de_acta : '') }}">
                @if($errors->has('numero_de_acta'))
                    <p class="help-block">
                        {{ $errors->first('numero_de_acta') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actasCog.fields.numero_de_acta_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fecha_de_convocatoria') ? 'has-error' : '' }}">
                <label for="fecha_de_convocatoria">{{ trans('cruds.actasCog.fields.fecha_de_convocatoria') }}</label>
                <input type="text" id="fecha_de_convocatoria" name="fecha_de_convocatoria" class="form-control date" value="{{ old('fecha_de_convocatoria', isset($actasCog) ? $actasCog->fecha_de_convocatoria : '') }}">
                @if($errors->has('fecha_de_convocatoria'))
                    <p class="help-block">
                        {{ $errors->first('fecha_de_convocatoria') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actasCog.fields.fecha_de_convocatoria_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('provincia_id') ? 'has-error' : '' }}">
                <label for="provincia">{{ trans('cruds.actasCog.fields.provincia') }}</label>
                <select name="provincia_id" id="provincia" class="form-control select2">
                    @foreach($provincias as $id => $provincia)
                        <option value="{{ $id }}" {{ (isset($actasCog) && $actasCog->provincia ? $actasCog->provincia->id : old('provincia_id')) == $id ? 'selected' : '' }}>{{ $provincia }}</option>
                    @endforeach
                </select>
                @if($errors->has('provincia_id'))
                    <p class="help-block">
                        {{ $errors->first('provincia_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('grupo_id') ? 'has-error' : '' }}">
                <label for="grupo">{{ trans('cruds.actasCog.fields.grupo') }}</label>
                <select name="grupo_id" id="grupo" class="form-control select2">
                    @foreach($grupos as $id => $grupo)
                        <option value="{{ $id }}" {{ (isset($actasCog) && $actasCog->grupo ? $actasCog->grupo->id : old('grupo_id')) == $id ? 'selected' : '' }}>{{ $grupo }}</option>
                    @endforeach
                </select>
                @if($errors->has('grupo_id'))
                    <p class="help-block">
                        {{ $errors->first('grupo_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('lugar') ? 'has-error' : '' }}">
                <label for="lugar">{{ trans('cruds.actasCog.fields.lugar') }}</label>
                <input type="text" id="lugar" name="lugar" class="form-control" value="{{ old('lugar', isset($actasCog) ? $actasCog->lugar : '') }}">
                @if($errors->has('lugar'))
                    <p class="help-block">
                        {{ $errors->first('lugar') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actasCog.fields.lugar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('orden_del_dia') ? 'has-error' : '' }}">
                <label for="orden_del_dia">{{ trans('cruds.actasCog.fields.orden_del_dia') }}</label>
                <textarea id="orden_del_dia" name="orden_del_dia" class="form-control ckeditor">{{ old('orden_del_dia', isset($actasCog) ? $actasCog->orden_del_dia : '') }}</textarea>
                @if($errors->has('orden_del_dia'))
                    <p class="help-block">
                        {{ $errors->first('orden_del_dia') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actasCog.fields.orden_del_dia_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fecha_de_acta') ? 'has-error' : '' }}">
                <label for="fecha_de_acta">{{ trans('cruds.actasCog.fields.fecha_de_acta') }}</label>
                <input type="text" id="fecha_de_acta" name="fecha_de_acta" class="form-control date" value="{{ old('fecha_de_acta', isset($actasCog) ? $actasCog->fecha_de_acta : '') }}">
                @if($errors->has('fecha_de_acta'))
                    <p class="help-block">
                        {{ $errors->first('fecha_de_acta') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actasCog.fields.fecha_de_acta_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('hora_inicio') ? 'has-error' : '' }}">
                <label for="hora_inicio">{{ trans('cruds.actasCog.fields.hora_inicio') }}</label>
                <input type="text" id="hora_inicio" name="hora_inicio" class="form-control timepicker" value="{{ old('hora_inicio', isset($actasCog) ? $actasCog->hora_inicio : '') }}">
                @if($errors->has('hora_inicio'))
                    <p class="help-block">
                        {{ $errors->first('hora_inicio') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actasCog.fields.hora_inicio_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('hora_fin') ? 'has-error' : '' }}">
                <label for="hora_fin">{{ trans('cruds.actasCog.fields.hora_fin') }}</label>
                <input type="text" id="hora_fin" name="hora_fin" class="form-control timepicker" value="{{ old('hora_fin', isset($actasCog) ? $actasCog->hora_fin : '') }}">
                @if($errors->has('hora_fin'))
                    <p class="help-block">
                        {{ $errors->first('hora_fin') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actasCog.fields.hora_fin_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('relatoria') ? 'has-error' : '' }}">
                <label for="relatoria">{{ trans('cruds.actasCog.fields.relatoria') }}</label>
                <textarea id="relatoria" name="relatoria" class="form-control ">{{ old('relatoria', isset($actasCog) ? $actasCog->relatoria : '') }}</textarea>
                @if($errors->has('relatoria'))
                    <p class="help-block">
                        {{ $errors->first('relatoria') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actasCog.fields.relatoria_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('asistentes') ? 'has-error' : '' }}">
                <label for="asistentes">{{ trans('cruds.actasCog.fields.asistentes') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="asistentes[]" id="asistentes" class="form-control select2" multiple="multiple">
                    @foreach($asistentes as $id => $asistentes)
                        <option value="{{ $id }}" {{ (in_array($id, old('asistentes', [])) || isset($actasCog) && $actasCog->asistentes->contains($id)) ? 'selected' : '' }}>{{ $asistentes }}</option>
                    @endforeach
                </select>
                @if($errors->has('asistentes'))
                    <p class="help-block">
                        {{ $errors->first('asistentes') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actasCog.fields.asistentes_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('imagen_de_acta') ? 'has-error' : '' }}">
                <label for="imagen_de_acta">{{ trans('cruds.actasCog.fields.imagen_de_acta') }}</label>
                <div class="needsclick dropzone" id="imagen_de_acta-dropzone">

                </div>
                @if($errors->has('imagen_de_acta'))
                    <p class="help-block">
                        {{ $errors->first('imagen_de_acta') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actasCog.fields.imagen_de_acta_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('vobo_id') ? 'has-error' : '' }}">
                <label for="vobo">{{ trans('cruds.actasCog.fields.vobo') }}</label>
                <select name="vobo_id" id="vobo" class="form-control select2">
                    @foreach($vobos as $id => $vobo)
                        <option value="{{ $id }}" {{ (isset($actasCog) && $actasCog->vobo ? $actasCog->vobo->id : old('vobo_id')) == $id ? 'selected' : '' }}>{{ $vobo }}</option>
                    @endforeach
                </select>
                @if($errors->has('vobo_id'))
                    <p class="help-block">
                        {{ $errors->first('vobo_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('observaciones') ? 'has-error' : '' }}">
                <label for="observaciones">{{ trans('cruds.actasCog.fields.observaciones') }}</label>
                <textarea id="observaciones" name="observaciones" class="form-control ">{{ old('observaciones', isset($actasCog) ? $actasCog->observaciones : '') }}</textarea>
                @if($errors->has('observaciones'))
                    <p class="help-block">
                        {{ $errors->first('observaciones') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.actasCog.fields.observaciones_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.imagenDeActaDropzone = {
    url: '{{ route('admin.actas-cogs.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="imagen_de_acta"]').remove()
      $('form').append('<input type="hidden" name="imagen_de_acta" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="imagen_de_acta"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($actasCog) && $actasCog->imagen_de_acta)
      var file = {!! json_encode($actasCog->imagen_de_acta) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="imagen_de_acta" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop