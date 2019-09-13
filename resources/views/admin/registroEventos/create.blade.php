@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.registroEvento.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.registro-eventos.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('evento_id') ? 'has-error' : '' }}">
                            <label for="evento">{{ trans('cruds.registroEvento.fields.evento') }}*</label>
                            <select name="evento_id" id="evento" class="form-control select2" required>
                                @foreach($eventos as $id => $evento)
                                    <option value="{{ $id }}" {{ (isset($registroEvento) && $registroEvento->evento ? $registroEvento->evento->id : old('evento_id')) == $id ? 'selected' : '' }}>{{ $evento }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('evento_id'))
                                <p class="help-block">
                                    {{ $errors->first('evento_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('grupo_id') ? 'has-error' : '' }}">
                            <label for="grupo">{{ trans('cruds.registroEvento.fields.grupo') }}*</label>
                            <select name="grupo_id" id="grupo" class="form-control select2" required>
                                @foreach($grupos as $id => $grupo)
                                    <option value="{{ $id }}" {{ (isset($registroEvento) && $registroEvento->grupo ? $registroEvento->grupo->id : old('grupo_id')) == $id ? 'selected' : '' }}>{{ $grupo }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('grupo_id'))
                                <p class="help-block">
                                    {{ $errors->first('grupo_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('participantes_mls') ? 'has-error' : '' }}">
                            <label for="participantes_ml">{{ trans('cruds.registroEvento.fields.participantes_ml') }}
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="participantes_mls[]" id="participantes_mls" class="form-control select2" multiple="multiple">
                                @foreach($participantes_mls as $id => $participantes_ml)
                                    <option value="{{ $id }}" {{ (in_array($id, old('participantes_mls', [])) || isset($registroEvento) && $registroEvento->participantes_mls->contains($id)) ? 'selected' : '' }}>{{ $participantes_ml }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('participantes_mls'))
                                <p class="help-block">
                                    {{ $errors->first('participantes_mls') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.registroEvento.fields.participantes_ml_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('comprobante_de_pago') ? 'has-error' : '' }}">
                            <label for="comprobante_de_pago">{{ trans('cruds.registroEvento.fields.comprobante_de_pago') }}</label>
                            <div class="needsclick dropzone" id="comprobante_de_pago-dropzone">

                            </div>
                            @if($errors->has('comprobante_de_pago'))
                                <p class="help-block">
                                    {{ $errors->first('comprobante_de_pago') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.registroEvento.fields.comprobante_de_pago_helper') }}
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

@section('scripts')
<script>
    var uploadedComprobanteDePagoMap = {}
Dropzone.options.comprobanteDePagoDropzone = {
    url: '{{ route('admin.registro-eventos.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="comprobante_de_pago[]" value="' + response.name + '">')
      uploadedComprobanteDePagoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedComprobanteDePagoMap[file.name]
      }
      $('form').find('input[name="comprobante_de_pago[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($registroEvento) && $registroEvento->comprobante_de_pago)
      var files =
        {!! json_encode($registroEvento->comprobante_de_pago) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="comprobante_de_pago[]" value="' + file.file_name + '">')
        }
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