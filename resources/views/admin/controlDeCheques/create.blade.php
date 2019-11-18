@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.controlDeCheque.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.control-de-cheques.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('cuenta') ? 'has-error' : '' }}">
                <label for="cuenta">{{ trans('cruds.controlDeCheque.fields.cuenta') }}</label>
                <input type="text" id="cuenta" name="cuenta" class="form-control" value="{{ old('cuenta', isset($controlDeCheque) ? $controlDeCheque->cuenta : '') }}">
                @if($errors->has('cuenta'))
                    <p class="help-block">
                        {{ $errors->first('cuenta') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.controlDeCheque.fields.cuenta_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('numero_de_cheque') ? 'has-error' : '' }}">
                <label for="numero_de_cheque">{{ trans('cruds.controlDeCheque.fields.numero_de_cheque') }}*</label>
                <input type="text" id="numero_de_cheque" name="numero_de_cheque" class="form-control" value="{{ old('numero_de_cheque', isset($controlDeCheque) ? $controlDeCheque->numero_de_cheque : '') }}" required>
                @if($errors->has('numero_de_cheque'))
                    <p class="help-block">
                        {{ $errors->first('numero_de_cheque') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.controlDeCheque.fields.numero_de_cheque_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('nombre_a_quien_se_expide') ? 'has-error' : '' }}">
                <label for="nombre_a_quien_se_expide">{{ trans('cruds.controlDeCheque.fields.nombre_a_quien_se_expide') }}*</label>
                <input type="text" id="nombre_a_quien_se_expide" name="nombre_a_quien_se_expide" class="form-control" value="{{ old('nombre_a_quien_se_expide', isset($controlDeCheque) ? $controlDeCheque->nombre_a_quien_se_expide : '') }}" required>
                @if($errors->has('nombre_a_quien_se_expide'))
                    <p class="help-block">
                        {{ $errors->first('nombre_a_quien_se_expide') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.controlDeCheque.fields.nombre_a_quien_se_expide_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : '' }}">
                <label for="cantidad">{{ trans('cruds.controlDeCheque.fields.cantidad') }}*</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ old('cantidad', isset($controlDeCheque) ? $controlDeCheque->cantidad : '') }}" step="0.01" required>
                @if($errors->has('cantidad'))
                    <p class="help-block">
                        {{ $errors->first('cantidad') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.controlDeCheque.fields.cantidad_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">{{ trans('cruds.controlDeCheque.fields.descripcion') }}*</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', isset($controlDeCheque) ? $controlDeCheque->descripcion : '') }}" required>
                @if($errors->has('descripcion'))
                    <p class="help-block">
                        {{ $errors->first('descripcion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.controlDeCheque.fields.descripcion_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fecha_de_expedicion') ? 'has-error' : '' }}">
                <label for="fecha_de_expedicion">{{ trans('cruds.controlDeCheque.fields.fecha_de_expedicion') }}*</label>
                <input type="text" id="fecha_de_expedicion" name="fecha_de_expedicion" class="form-control date" value="{{ old('fecha_de_expedicion', isset($controlDeCheque) ? $controlDeCheque->fecha_de_expedicion : '') }}" required>
                @if($errors->has('fecha_de_expedicion'))
                    <p class="help-block">
                        {{ $errors->first('fecha_de_expedicion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.controlDeCheque.fields.fecha_de_expedicion_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fecha_de_entrega') ? 'has-error' : '' }}">
                <label for="fecha_de_entrega">{{ trans('cruds.controlDeCheque.fields.fecha_de_entrega') }}</label>
                <input type="text" id="fecha_de_entrega" name="fecha_de_entrega" class="form-control date" value="{{ old('fecha_de_entrega', isset($controlDeCheque) ? $controlDeCheque->fecha_de_entrega : '') }}">
                @if($errors->has('fecha_de_entrega'))
                    <p class="help-block">
                        {{ $errors->first('fecha_de_entrega') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.controlDeCheque.fields.fecha_de_entrega_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('nombre_a_quien_se_entrego') ? 'has-error' : '' }}">
                <label for="nombre_a_quien_se_entrego">{{ trans('cruds.controlDeCheque.fields.nombre_a_quien_se_entrego') }}</label>
                <input type="text" id="nombre_a_quien_se_entrego" name="nombre_a_quien_se_entrego" class="form-control" value="{{ old('nombre_a_quien_se_entrego', isset($controlDeCheque) ? $controlDeCheque->nombre_a_quien_se_entrego : '') }}">
                @if($errors->has('nombre_a_quien_se_entrego'))
                    <p class="help-block">
                        {{ $errors->first('nombre_a_quien_se_entrego') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.controlDeCheque.fields.nombre_a_quien_se_entrego_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fecha_de_cobro') ? 'has-error' : '' }}">
                <label for="fecha_de_cobro">{{ trans('cruds.controlDeCheque.fields.fecha_de_cobro') }}</label>
                <input type="text" id="fecha_de_cobro" name="fecha_de_cobro" class="form-control date" value="{{ old('fecha_de_cobro', isset($controlDeCheque) ? $controlDeCheque->fecha_de_cobro : '') }}">
                @if($errors->has('fecha_de_cobro'))
                    <p class="help-block">
                        {{ $errors->first('fecha_de_cobro') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.controlDeCheque.fields.fecha_de_cobro_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('imagen_de_poliza') ? 'has-error' : '' }}">
                <label for="imagen_de_poliza">{{ trans('cruds.controlDeCheque.fields.imagen_de_poliza') }}</label>
                <div class="needsclick dropzone" id="imagen_de_poliza-dropzone">

                </div>
                @if($errors->has('imagen_de_poliza'))
                    <p class="help-block">
                        {{ $errors->first('imagen_de_poliza') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.controlDeCheque.fields.imagen_de_poliza_helper') }}
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
    Dropzone.options.imagenDePolizaDropzone = {
    url: '{{ route('admin.control-de-cheques.storeMedia') }}',
    maxFilesize: 4, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').find('input[name="imagen_de_poliza"]').remove()
      $('form').append('<input type="hidden" name="imagen_de_poliza" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="imagen_de_poliza"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($controlDeCheque) && $controlDeCheque->imagen_de_poliza)
      var file = {!! json_encode($controlDeCheque->imagen_de_poliza) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="imagen_de_poliza" value="' + file.file_name + '">')
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