@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.controlDeGasto.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.control-de-gastos.update", [$controlDeGasto->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('cheque_id') ? 'has-error' : '' }}">
                            <label for="cheque">{{ trans('cruds.controlDeGasto.fields.cheque') }}</label>
                            <select name="cheque_id" id="cheque" class="form-control select2">
                                @foreach($cheques as $id => $cheque)
                                    <option value="{{ $id }}" {{ (isset($controlDeGasto) && $controlDeGasto->cheque ? $controlDeGasto->cheque->id : old('cheque_id')) == $id ? 'selected' : '' }}>{{ $cheque }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cheque_id'))
                                <p class="help-block">
                                    {{ $errors->first('cheque_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                            <label for="descripcion">{{ trans('cruds.controlDeGasto.fields.descripcion') }}*</label>
                            <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', isset($controlDeGasto) ? $controlDeGasto->descripcion : '') }}" required>
                            @if($errors->has('descripcion'))
                                <p class="help-block">
                                    {{ $errors->first('descripcion') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.controlDeGasto.fields.descripcion_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('evento_id') ? 'has-error' : '' }}">
                            <label for="evento">{{ trans('cruds.controlDeGasto.fields.evento') }}</label>
                            <select name="evento_id" id="evento" class="form-control select2">
                                @foreach($eventos as $id => $evento)
                                    <option value="{{ $id }}" {{ (isset($controlDeGasto) && $controlDeGasto->evento ? $controlDeGasto->evento->id : old('evento_id')) == $id ? 'selected' : '' }}>{{ $evento }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('evento_id'))
                                <p class="help-block">
                                    {{ $errors->first('evento_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
                            <label for="total">{{ trans('cruds.controlDeGasto.fields.total') }}*</label>
                            <input type="number" id="total" name="total" class="form-control" value="{{ old('total', isset($controlDeGasto) ? $controlDeGasto->total : '') }}" step="0.01" required>
                            @if($errors->has('total'))
                                <p class="help-block">
                                    {{ $errors->first('total') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.controlDeGasto.fields.total_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('iva') ? 'has-error' : '' }}">
                            <label for="iva">{{ trans('cruds.controlDeGasto.fields.iva') }}</label>
                            <input type="number" id="iva" name="iva" class="form-control" value="{{ old('iva', isset($controlDeGasto) ? $controlDeGasto->iva : '') }}" step="0.01">
                            @if($errors->has('iva'))
                                <p class="help-block">
                                    {{ $errors->first('iva') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.controlDeGasto.fields.iva_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('notas') ? 'has-error' : '' }}">
                            <label for="notas">{{ trans('cruds.controlDeGasto.fields.notas') }}</label>
                            <div class="needsclick dropzone" id="notas-dropzone">

                            </div>
                            @if($errors->has('notas'))
                                <p class="help-block">
                                    {{ $errors->first('notas') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.controlDeGasto.fields.notas_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('folio_fiscal') ? 'has-error' : '' }}">
                            <label for="folio_fiscal">{{ trans('cruds.controlDeGasto.fields.folio_fiscal') }}</label>
                            <input type="text" id="folio_fiscal" name="folio_fiscal" class="form-control" value="{{ old('folio_fiscal', isset($controlDeGasto) ? $controlDeGasto->folio_fiscal : '') }}">
                            @if($errors->has('folio_fiscal'))
                                <p class="help-block">
                                    {{ $errors->first('folio_fiscal') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.controlDeGasto.fields.folio_fiscal_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('pdf') ? 'has-error' : '' }}">
                            <label for="pdf">{{ trans('cruds.controlDeGasto.fields.pdf') }}</label>
                            <div class="needsclick dropzone" id="pdf-dropzone">

                            </div>
                            @if($errors->has('pdf'))
                                <p class="help-block">
                                    {{ $errors->first('pdf') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.controlDeGasto.fields.pdf_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('xml') ? 'has-error' : '' }}">
                            <label for="xml">{{ trans('cruds.controlDeGasto.fields.xml') }}</label>
                            <div class="needsclick dropzone" id="xml-dropzone">

                            </div>
                            @if($errors->has('xml'))
                                <p class="help-block">
                                    {{ $errors->first('xml') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.controlDeGasto.fields.xml_helper') }}
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
    var uploadedNotasMap = {}
Dropzone.options.notasDropzone = {
    url: '{{ route('admin.control-de-gastos.storeMedia') }}',
    maxFilesize: 4, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="notas[]" value="' + response.name + '">')
      uploadedNotasMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedNotasMap[file.name]
      }
      $('form').find('input[name="notas[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($controlDeGasto) && $controlDeGasto->notas)
          var files =
            {!! json_encode($controlDeGasto->notas) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="notas[]" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.pdfDropzone = {
    url: '{{ route('admin.control-de-gastos.storeMedia') }}',
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
      $('form').find('input[name="pdf"]').remove()
      $('form').append('<input type="hidden" name="pdf" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="pdf"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
@if(isset($controlDeGasto) && $controlDeGasto->pdf)
      var file = {!! json_encode($controlDeGasto->pdf) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="pdf" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.xmlDropzone = {
    url: '{{ route('admin.control-de-gastos.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="xml"]').remove()
      $('form').append('<input type="hidden" name="xml" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="xml"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
@if(isset($controlDeGasto) && $controlDeGasto->xml)
      var file = {!! json_encode($controlDeGasto->xml) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="xml" value="' + file.file_name + '">')
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