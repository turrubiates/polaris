@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.fichaMedica.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.ficha-medicas.update", [$fichaMedica->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('miembro_id') ? 'has-error' : '' }}">
                <label for="miembro">{{ trans('cruds.fichaMedica.fields.miembro') }}*</label>
                <select name="miembro_id" id="miembro" class="form-control select2" required>
                    @foreach($miembros as $id => $miembro)
                        <option value="{{ $id }}" {{ (isset($fichaMedica) && $fichaMedica->miembro ? $fichaMedica->miembro->id : old('miembro_id')) == $id ? 'selected' : '' }}>{{ $miembro }}</option>
                    @endforeach
                </select>
                @if($errors->has('miembro_id'))
                    <p class="help-block">
                        {{ $errors->first('miembro_id') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection