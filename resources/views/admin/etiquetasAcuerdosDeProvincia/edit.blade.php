@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.etiquetasAcuerdosDeProvincium.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.etiquetas-acuerdos-de-provincia.update", [$etiquetasAcuerdosDeProvincium->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('etiqueta_acuerdo_de_provincia') ? 'has-error' : '' }}">
                <label for="etiqueta_acuerdo_de_provincia">{{ trans('cruds.etiquetasAcuerdosDeProvincium.fields.etiqueta_acuerdo_de_provincia') }}*</label>
                <input type="text" id="etiqueta_acuerdo_de_provincia" name="etiqueta_acuerdo_de_provincia" class="form-control" value="{{ old('etiqueta_acuerdo_de_provincia', isset($etiquetasAcuerdosDeProvincium) ? $etiquetasAcuerdosDeProvincium->etiqueta_acuerdo_de_provincia : '') }}" required>
                @if($errors->has('etiqueta_acuerdo_de_provincia'))
                    <p class="help-block">
                        {{ $errors->first('etiqueta_acuerdo_de_provincia') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.etiquetasAcuerdosDeProvincium.fields.etiqueta_acuerdo_de_provincia_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection