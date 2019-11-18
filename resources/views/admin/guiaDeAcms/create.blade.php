@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.guiaDeAcm.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.guia-de-acms.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('cargo') ? 'has-error' : '' }}">
                <label for="cargo">{{ trans('cruds.guiaDeAcm.fields.cargo') }}*</label>
                <input type="text" id="cargo" name="cargo" class="form-control" value="{{ old('cargo', isset($guiaDeAcm) ? $guiaDeAcm->cargo : '') }}" required>
                @if($errors->has('cargo'))
                    <p class="help-block">
                        {{ $errors->first('cargo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.guiaDeAcm.fields.cargo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('acm') ? 'has-error' : '' }}">
                <label for="acm">{{ trans('cruds.guiaDeAcm.fields.acm') }}</label>
                <textarea id="acm" name="acm" class="form-control ckeditor">{{ old('acm', isset($guiaDeAcm) ? $guiaDeAcm->acm : '') }}</textarea>
                @if($errors->has('acm'))
                    <p class="help-block">
                        {{ $errors->first('acm') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.guiaDeAcm.fields.acm_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection