@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.presupuestoAnual.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.presupuesto-anuals.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('provincia_id') ? 'has-error' : '' }}">
                <label for="provincia">{{ trans('cruds.presupuestoAnual.fields.provincia') }}*</label>
                <select name="provincia_id" id="provincia" class="form-control select2" required>
                    @foreach($provincias as $id => $provincia)
                        <option value="{{ $id }}" {{ (isset($presupuestoAnual) && $presupuestoAnual->provincia ? $presupuestoAnual->provincia->id : old('provincia_id')) == $id ? 'selected' : '' }}>{{ $provincia }}</option>
                    @endforeach
                </select>
                @if($errors->has('provincia_id'))
                    <p class="help-block">
                        {{ $errors->first('provincia_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('periodo') ? 'has-error' : '' }}">
                <label for="periodo">{{ trans('cruds.presupuestoAnual.fields.periodo') }}*</label>
                <input type="text" id="periodo" name="periodo" class="form-control" value="{{ old('periodo', isset($presupuestoAnual) ? $presupuestoAnual->periodo : '') }}" required>
                @if($errors->has('periodo'))
                    <p class="help-block">
                        {{ $errors->first('periodo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.periodo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.presupuestoAnual.fields.tipo') }}</label>
                @foreach(App\PresupuestoAnual::TIPO_RADIO as $key => $label)
                    <div>
                        <input id="tipo_{{ $key }}" name="tipo" type="radio" value="{{ $key }}" {{ old('tipo', null) === (string)$key ? 'checked' : '' }}>
                        <label for="tipo_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('tipo'))
                    <p class="help-block">
                        {{ $errors->first('tipo') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('partida') ? 'has-error' : '' }}">
                <label for="partida">{{ trans('cruds.presupuestoAnual.fields.partida') }}*</label>
                <input type="text" id="partida" name="partida" class="form-control" value="{{ old('partida', isset($presupuestoAnual) ? $presupuestoAnual->partida : '') }}" required>
                @if($errors->has('partida'))
                    <p class="help-block">
                        {{ $errors->first('partida') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.partida_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('presupuestado_ene') ? 'has-error' : '' }}">
                <label for="presupuestado_ene">{{ trans('cruds.presupuestoAnual.fields.presupuestado_ene') }}</label>
                <input type="number" id="presupuestado_ene" name="presupuestado_ene" class="form-control" value="{{ old('presupuestado_ene', isset($presupuestoAnual) ? $presupuestoAnual->presupuestado_ene : '') }}" step="0.01">
                @if($errors->has('presupuestado_ene'))
                    <p class="help-block">
                        {{ $errors->first('presupuestado_ene') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.presupuestado_ene_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('presupuestado_feb') ? 'has-error' : '' }}">
                <label for="presupuestado_feb">{{ trans('cruds.presupuestoAnual.fields.presupuestado_feb') }}</label>
                <input type="number" id="presupuestado_feb" name="presupuestado_feb" class="form-control" value="{{ old('presupuestado_feb', isset($presupuestoAnual) ? $presupuestoAnual->presupuestado_feb : '') }}" step="0.01">
                @if($errors->has('presupuestado_feb'))
                    <p class="help-block">
                        {{ $errors->first('presupuestado_feb') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.presupuestado_feb_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('presupuestado_mar') ? 'has-error' : '' }}">
                <label for="presupuestado_mar">{{ trans('cruds.presupuestoAnual.fields.presupuestado_mar') }}</label>
                <input type="number" id="presupuestado_mar" name="presupuestado_mar" class="form-control" value="{{ old('presupuestado_mar', isset($presupuestoAnual) ? $presupuestoAnual->presupuestado_mar : '') }}" step="0.01">
                @if($errors->has('presupuestado_mar'))
                    <p class="help-block">
                        {{ $errors->first('presupuestado_mar') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.presupuestado_mar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('presupuestado_abr') ? 'has-error' : '' }}">
                <label for="presupuestado_abr">{{ trans('cruds.presupuestoAnual.fields.presupuestado_abr') }}</label>
                <input type="number" id="presupuestado_abr" name="presupuestado_abr" class="form-control" value="{{ old('presupuestado_abr', isset($presupuestoAnual) ? $presupuestoAnual->presupuestado_abr : '') }}" step="0.01">
                @if($errors->has('presupuestado_abr'))
                    <p class="help-block">
                        {{ $errors->first('presupuestado_abr') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.presupuestado_abr_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('presupuestado_may') ? 'has-error' : '' }}">
                <label for="presupuestado_may">{{ trans('cruds.presupuestoAnual.fields.presupuestado_may') }}</label>
                <input type="number" id="presupuestado_may" name="presupuestado_may" class="form-control" value="{{ old('presupuestado_may', isset($presupuestoAnual) ? $presupuestoAnual->presupuestado_may : '') }}" step="0.01">
                @if($errors->has('presupuestado_may'))
                    <p class="help-block">
                        {{ $errors->first('presupuestado_may') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.presupuestado_may_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('presupuestado_jun') ? 'has-error' : '' }}">
                <label for="presupuestado_jun">{{ trans('cruds.presupuestoAnual.fields.presupuestado_jun') }}</label>
                <input type="number" id="presupuestado_jun" name="presupuestado_jun" class="form-control" value="{{ old('presupuestado_jun', isset($presupuestoAnual) ? $presupuestoAnual->presupuestado_jun : '') }}" step="0.01">
                @if($errors->has('presupuestado_jun'))
                    <p class="help-block">
                        {{ $errors->first('presupuestado_jun') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.presupuestado_jun_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('presupuestado_jul') ? 'has-error' : '' }}">
                <label for="presupuestado_jul">{{ trans('cruds.presupuestoAnual.fields.presupuestado_jul') }}</label>
                <input type="number" id="presupuestado_jul" name="presupuestado_jul" class="form-control" value="{{ old('presupuestado_jul', isset($presupuestoAnual) ? $presupuestoAnual->presupuestado_jul : '') }}" step="0.01">
                @if($errors->has('presupuestado_jul'))
                    <p class="help-block">
                        {{ $errors->first('presupuestado_jul') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.presupuestado_jul_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('presupuestado_ago') ? 'has-error' : '' }}">
                <label for="presupuestado_ago">{{ trans('cruds.presupuestoAnual.fields.presupuestado_ago') }}</label>
                <input type="number" id="presupuestado_ago" name="presupuestado_ago" class="form-control" value="{{ old('presupuestado_ago', isset($presupuestoAnual) ? $presupuestoAnual->presupuestado_ago : '') }}" step="0.01">
                @if($errors->has('presupuestado_ago'))
                    <p class="help-block">
                        {{ $errors->first('presupuestado_ago') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.presupuestado_ago_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('presupuestado_sep') ? 'has-error' : '' }}">
                <label for="presupuestado_sep">{{ trans('cruds.presupuestoAnual.fields.presupuestado_sep') }}</label>
                <input type="number" id="presupuestado_sep" name="presupuestado_sep" class="form-control" value="{{ old('presupuestado_sep', isset($presupuestoAnual) ? $presupuestoAnual->presupuestado_sep : '') }}" step="0.01">
                @if($errors->has('presupuestado_sep'))
                    <p class="help-block">
                        {{ $errors->first('presupuestado_sep') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.presupuestado_sep_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('presupuestado_oct') ? 'has-error' : '' }}">
                <label for="presupuestado_oct">{{ trans('cruds.presupuestoAnual.fields.presupuestado_oct') }}</label>
                <input type="number" id="presupuestado_oct" name="presupuestado_oct" class="form-control" value="{{ old('presupuestado_oct', isset($presupuestoAnual) ? $presupuestoAnual->presupuestado_oct : '') }}" step="0.01">
                @if($errors->has('presupuestado_oct'))
                    <p class="help-block">
                        {{ $errors->first('presupuestado_oct') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.presupuestado_oct_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('presupuestado_nov') ? 'has-error' : '' }}">
                <label for="presupuestado_nov">{{ trans('cruds.presupuestoAnual.fields.presupuestado_nov') }}</label>
                <input type="number" id="presupuestado_nov" name="presupuestado_nov" class="form-control" value="{{ old('presupuestado_nov', isset($presupuestoAnual) ? $presupuestoAnual->presupuestado_nov : '') }}" step="0.01">
                @if($errors->has('presupuestado_nov'))
                    <p class="help-block">
                        {{ $errors->first('presupuestado_nov') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.presupuestado_nov_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('presupuestado_dic') ? 'has-error' : '' }}">
                <label for="presupuestado_dic">{{ trans('cruds.presupuestoAnual.fields.presupuestado_dic') }}</label>
                <input type="number" id="presupuestado_dic" name="presupuestado_dic" class="form-control" value="{{ old('presupuestado_dic', isset($presupuestoAnual) ? $presupuestoAnual->presupuestado_dic : '') }}" step="0.01">
                @if($errors->has('presupuestado_dic'))
                    <p class="help-block">
                        {{ $errors->first('presupuestado_dic') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.presupuestoAnual.fields.presupuestado_dic_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection