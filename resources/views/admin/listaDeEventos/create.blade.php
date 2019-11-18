@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.listaDeEvento.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.lista-de-eventos.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nombre_de_evento') ? 'has-error' : '' }}">
                <label for="nombre_de_evento">{{ trans('cruds.listaDeEvento.fields.nombre_de_evento') }}*</label>
                <input type="text" id="nombre_de_evento" name="nombre_de_evento" class="form-control" value="{{ old('nombre_de_evento', isset($listaDeEvento) ? $listaDeEvento->nombre_de_evento : '') }}" required>
                @if($errors->has('nombre_de_evento'))
                    <p class="help-block">
                        {{ $errors->first('nombre_de_evento') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.nombre_de_evento_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('responsable_de_evento_id') ? 'has-error' : '' }}">
                <label for="responsable_de_evento">{{ trans('cruds.listaDeEvento.fields.responsable_de_evento') }}*</label>
                <select name="responsable_de_evento_id" id="responsable_de_evento" class="form-control select2" required>
                    @foreach($responsable_de_eventos as $id => $responsable_de_evento)
                        <option value="{{ $id }}" {{ (isset($listaDeEvento) && $listaDeEvento->responsable_de_evento ? $listaDeEvento->responsable_de_evento->id : old('responsable_de_evento_id')) == $id ? 'selected' : '' }}>{{ $responsable_de_evento }}</option>
                    @endforeach
                </select>
                @if($errors->has('responsable_de_evento_id'))
                    <p class="help-block">
                        {{ $errors->first('responsable_de_evento_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('participantes') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.listaDeEvento.fields.participantes') }}*</label>
                @foreach(App\ListaDeEvento::PARTICIPANTES_RADIO as $key => $label)
                    <div>
                        <input id="participantes_{{ $key }}" name="participantes" type="radio" value="{{ $key }}" {{ old('participantes', null) === (string)$key ? 'checked' : '' }} required>
                        <label for="participantes_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('participantes'))
                    <p class="help-block">
                        {{ $errors->first('participantes') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('participantes_ml') ? 'has-error' : '' }}">
                <label for="participantes_ml">{{ trans('cruds.listaDeEvento.fields.participantes_ml') }}</label>
                <input name="participantes_ml" type="hidden" value="0">
                <input value="1" type="checkbox" id="participantes_ml" name="participantes_ml" {{ old('participantes_ml', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('participantes_ml'))
                    <p class="help-block">
                        {{ $errors->first('participantes_ml') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.participantes_ml_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('participantes_ts') ? 'has-error' : '' }}">
                <label for="participantes_ts">{{ trans('cruds.listaDeEvento.fields.participantes_ts') }}</label>
                <input name="participantes_ts" type="hidden" value="0">
                <input value="1" type="checkbox" id="participantes_ts" name="participantes_ts" {{ old('participantes_ts', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('participantes_ts'))
                    <p class="help-block">
                        {{ $errors->first('participantes_ts') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.participantes_ts_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('participantes_cc') ? 'has-error' : '' }}">
                <label for="participantes_cc">{{ trans('cruds.listaDeEvento.fields.participantes_cc') }}</label>
                <input name="participantes_cc" type="hidden" value="0">
                <input value="1" type="checkbox" id="participantes_cc" name="participantes_cc" {{ old('participantes_cc', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('participantes_cc'))
                    <p class="help-block">
                        {{ $errors->first('participantes_cc') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.participantes_cc_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('participantes_cr') ? 'has-error' : '' }}">
                <label for="participantes_cr">{{ trans('cruds.listaDeEvento.fields.participantes_cr') }}</label>
                <input name="participantes_cr" type="hidden" value="0">
                <input value="1" type="checkbox" id="participantes_cr" name="participantes_cr" {{ old('participantes_cr', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('participantes_cr'))
                    <p class="help-block">
                        {{ $errors->first('participantes_cr') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.participantes_cr_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('participantes_sd') ? 'has-error' : '' }}">
                <label for="participantes_sd">{{ trans('cruds.listaDeEvento.fields.participantes_sd') }}</label>
                <input name="participantes_sd" type="hidden" value="0">
                <input value="1" type="checkbox" id="participantes_sd" name="participantes_sd" {{ old('participantes_sd', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('participantes_sd'))
                    <p class="help-block">
                        {{ $errors->first('participantes_sd') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.participantes_sd_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('participantes_ai') ? 'has-error' : '' }}">
                <label for="participantes_ai">{{ trans('cruds.listaDeEvento.fields.participantes_ai') }}</label>
                <input name="participantes_ai" type="hidden" value="0">
                <input value="1" type="checkbox" id="participantes_ai" name="participantes_ai" {{ old('participantes_ai', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('participantes_ai'))
                    <p class="help-block">
                        {{ $errors->first('participantes_ai') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.participantes_ai_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('lugar_de_evento') ? 'has-error' : '' }}">
                <label for="lugar_de_evento">{{ trans('cruds.listaDeEvento.fields.lugar_de_evento') }}</label>
                <input type="text" id="lugar_de_evento" name="lugar_de_evento" class="form-control" value="{{ old('lugar_de_evento', isset($listaDeEvento) ? $listaDeEvento->lugar_de_evento : '') }}">
                @if($errors->has('lugar_de_evento'))
                    <p class="help-block">
                        {{ $errors->first('lugar_de_evento') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.lugar_de_evento_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('inicio_de_evento') ? 'has-error' : '' }}">
                <label for="inicio_de_evento">{{ trans('cruds.listaDeEvento.fields.inicio_de_evento') }}*</label>
                <input type="text" id="inicio_de_evento" name="inicio_de_evento" class="form-control datetime" value="{{ old('inicio_de_evento', isset($listaDeEvento) ? $listaDeEvento->inicio_de_evento : '') }}" required>
                @if($errors->has('inicio_de_evento'))
                    <p class="help-block">
                        {{ $errors->first('inicio_de_evento') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.inicio_de_evento_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fin_de_evento') ? 'has-error' : '' }}">
                <label for="fin_de_evento">{{ trans('cruds.listaDeEvento.fields.fin_de_evento') }}*</label>
                <input type="text" id="fin_de_evento" name="fin_de_evento" class="form-control datetime" value="{{ old('fin_de_evento', isset($listaDeEvento) ? $listaDeEvento->fin_de_evento : '') }}" required>
                @if($errors->has('fin_de_evento'))
                    <p class="help-block">
                        {{ $errors->first('fin_de_evento') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.fin_de_evento_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('costo') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.listaDeEvento.fields.costo') }}*</label>
                @foreach(App\ListaDeEvento::COSTO_RADIO as $key => $label)
                    <div>
                        <input id="costo_{{ $key }}" name="costo" type="radio" value="{{ $key }}" {{ old('costo', 0) === (string)$key ? 'checked' : '' }} required>
                        <label for="costo_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('costo'))
                    <p class="help-block">
                        {{ $errors->first('costo') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('fecha_de_pago_1') ? 'has-error' : '' }}">
                <label for="fecha_de_pago_1">{{ trans('cruds.listaDeEvento.fields.fecha_de_pago_1') }}</label>
                <input type="text" id="fecha_de_pago_1" name="fecha_de_pago_1" class="form-control date" value="{{ old('fecha_de_pago_1', isset($listaDeEvento) ? $listaDeEvento->fecha_de_pago_1 : '') }}">
                @if($errors->has('fecha_de_pago_1'))
                    <p class="help-block">
                        {{ $errors->first('fecha_de_pago_1') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.fecha_de_pago_1_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('costo_participantes_fecha_1') ? 'has-error' : '' }}">
                <label for="costo_participantes_fecha_1">{{ trans('cruds.listaDeEvento.fields.costo_participantes_fecha_1') }}</label>
                <input type="number" id="costo_participantes_fecha_1" name="costo_participantes_fecha_1" class="form-control" value="{{ old('costo_participantes_fecha_1', isset($listaDeEvento) ? $listaDeEvento->costo_participantes_fecha_1 : '') }}" step="0.01">
                @if($errors->has('costo_participantes_fecha_1'))
                    <p class="help-block">
                        {{ $errors->first('costo_participantes_fecha_1') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.costo_participantes_fecha_1_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('referencia_de_pago') ? 'has-error' : '' }}">
                <label for="referencia_de_pago">{{ trans('cruds.listaDeEvento.fields.referencia_de_pago') }}</label>
                <input type="number" id="referencia_de_pago" name="referencia_de_pago" class="form-control" value="{{ old('referencia_de_pago', isset($listaDeEvento) ? $listaDeEvento->referencia_de_pago : '') }}" step="1">
                @if($errors->has('referencia_de_pago'))
                    <p class="help-block">
                        {{ $errors->first('referencia_de_pago') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.referencia_de_pago_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('nivel') ? 'has-error' : '' }}">
                <label for="nivel">{{ trans('cruds.listaDeEvento.fields.nivel') }}*</label>
                <select id="nivel" name="nivel" class="form-control" required>
                    <option value="" disabled {{ old('nivel', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\ListaDeEvento::NIVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('nivel', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('nivel'))
                    <p class="help-block">
                        {{ $errors->first('nivel') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('adultos_responsables') ? 'has-error' : '' }}">
                <label for="adultos_responsables">{{ trans('cruds.listaDeEvento.fields.adultos_responsables') }}</label>
                <select id="adultos_responsables" name="adultos_responsables" class="form-control">
                    <option value="" disabled {{ old('adultos_responsables', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\ListaDeEvento::ADULTOS_RESPONSABLES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('adultos_responsables', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('adultos_responsables'))
                    <p class="help-block">
                        {{ $errors->first('adultos_responsables') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('staff') ? 'has-error' : '' }}">
                <label for="staff">{{ trans('cruds.listaDeEvento.fields.staff') }}</label>
                <select id="staff" name="staff" class="form-control">
                    <option value="" disabled {{ old('staff', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\ListaDeEvento::STAFF_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('staff', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('staff'))
                    <p class="help-block">
                        {{ $errors->first('staff') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('costo_adultos_fecha_1') ? 'has-error' : '' }}">
                <label for="costo_adultos_fecha_1">{{ trans('cruds.listaDeEvento.fields.costo_adultos_fecha_1') }}</label>
                <input type="number" id="costo_adultos_fecha_1" name="costo_adultos_fecha_1" class="form-control" value="{{ old('costo_adultos_fecha_1', isset($listaDeEvento) ? $listaDeEvento->costo_adultos_fecha_1 : '') }}" step="0.01">
                @if($errors->has('costo_adultos_fecha_1'))
                    <p class="help-block">
                        {{ $errors->first('costo_adultos_fecha_1') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.costo_adultos_fecha_1_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('costo_staff_fecha_1') ? 'has-error' : '' }}">
                <label for="costo_staff_fecha_1">{{ trans('cruds.listaDeEvento.fields.costo_staff_fecha_1') }}</label>
                <input type="number" id="costo_staff_fecha_1" name="costo_staff_fecha_1" class="form-control" value="{{ old('costo_staff_fecha_1', isset($listaDeEvento) ? $listaDeEvento->costo_staff_fecha_1 : '') }}" step="0.01">
                @if($errors->has('costo_staff_fecha_1'))
                    <p class="help-block">
                        {{ $errors->first('costo_staff_fecha_1') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.costo_staff_fecha_1_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fecha_de_pago_2') ? 'has-error' : '' }}">
                <label for="fecha_de_pago_2">{{ trans('cruds.listaDeEvento.fields.fecha_de_pago_2') }}</label>
                <input type="text" id="fecha_de_pago_2" name="fecha_de_pago_2" class="form-control date" value="{{ old('fecha_de_pago_2', isset($listaDeEvento) ? $listaDeEvento->fecha_de_pago_2 : '') }}">
                @if($errors->has('fecha_de_pago_2'))
                    <p class="help-block">
                        {{ $errors->first('fecha_de_pago_2') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.fecha_de_pago_2_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('costo_participantes_fecha_2') ? 'has-error' : '' }}">
                <label for="costo_participantes_fecha_2">{{ trans('cruds.listaDeEvento.fields.costo_participantes_fecha_2') }}</label>
                <input type="number" id="costo_participantes_fecha_2" name="costo_participantes_fecha_2" class="form-control" value="{{ old('costo_participantes_fecha_2', isset($listaDeEvento) ? $listaDeEvento->costo_participantes_fecha_2 : '') }}" step="0.01">
                @if($errors->has('costo_participantes_fecha_2'))
                    <p class="help-block">
                        {{ $errors->first('costo_participantes_fecha_2') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.costo_participantes_fecha_2_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('costo_adultos_fecha_2') ? 'has-error' : '' }}">
                <label for="costo_adultos_fecha_2">{{ trans('cruds.listaDeEvento.fields.costo_adultos_fecha_2') }}</label>
                <input type="number" id="costo_adultos_fecha_2" name="costo_adultos_fecha_2" class="form-control" value="{{ old('costo_adultos_fecha_2', isset($listaDeEvento) ? $listaDeEvento->costo_adultos_fecha_2 : '') }}" step="0.01">
                @if($errors->has('costo_adultos_fecha_2'))
                    <p class="help-block">
                        {{ $errors->first('costo_adultos_fecha_2') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.costo_adultos_fecha_2_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('costo_staff_fecha_2') ? 'has-error' : '' }}">
                <label for="costo_staff_fecha_2">{{ trans('cruds.listaDeEvento.fields.costo_staff_fecha_2') }}</label>
                <input type="number" id="costo_staff_fecha_2" name="costo_staff_fecha_2" class="form-control" value="{{ old('costo_staff_fecha_2', isset($listaDeEvento) ? $listaDeEvento->costo_staff_fecha_2 : '') }}" step="0.01">
                @if($errors->has('costo_staff_fecha_2'))
                    <p class="help-block">
                        {{ $errors->first('costo_staff_fecha_2') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.costo_staff_fecha_2_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fecha_de_pago_3') ? 'has-error' : '' }}">
                <label for="fecha_de_pago_3">{{ trans('cruds.listaDeEvento.fields.fecha_de_pago_3') }}</label>
                <input type="text" id="fecha_de_pago_3" name="fecha_de_pago_3" class="form-control date" value="{{ old('fecha_de_pago_3', isset($listaDeEvento) ? $listaDeEvento->fecha_de_pago_3 : '') }}">
                @if($errors->has('fecha_de_pago_3'))
                    <p class="help-block">
                        {{ $errors->first('fecha_de_pago_3') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.fecha_de_pago_3_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('costo_participantes_fecha_3') ? 'has-error' : '' }}">
                <label for="costo_participantes_fecha_3">{{ trans('cruds.listaDeEvento.fields.costo_participantes_fecha_3') }}</label>
                <input type="number" id="costo_participantes_fecha_3" name="costo_participantes_fecha_3" class="form-control" value="{{ old('costo_participantes_fecha_3', isset($listaDeEvento) ? $listaDeEvento->costo_participantes_fecha_3 : '') }}" step="0.01">
                @if($errors->has('costo_participantes_fecha_3'))
                    <p class="help-block">
                        {{ $errors->first('costo_participantes_fecha_3') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.costo_participantes_fecha_3_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('costo_adultos_fecha_3') ? 'has-error' : '' }}">
                <label for="costo_adultos_fecha_3">{{ trans('cruds.listaDeEvento.fields.costo_adultos_fecha_3') }}</label>
                <input type="number" id="costo_adultos_fecha_3" name="costo_adultos_fecha_3" class="form-control" value="{{ old('costo_adultos_fecha_3', isset($listaDeEvento) ? $listaDeEvento->costo_adultos_fecha_3 : '') }}" step="0.01">
                @if($errors->has('costo_adultos_fecha_3'))
                    <p class="help-block">
                        {{ $errors->first('costo_adultos_fecha_3') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.costo_adultos_fecha_3_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('costo_staff_fecha_3') ? 'has-error' : '' }}">
                <label for="costo_staff_fecha_3">{{ trans('cruds.listaDeEvento.fields.costo_staff_fecha_3') }}</label>
                <input type="number" id="costo_staff_fecha_3" name="costo_staff_fecha_3" class="form-control" value="{{ old('costo_staff_fecha_3', isset($listaDeEvento) ? $listaDeEvento->costo_staff_fecha_3 : '') }}" step="0.01">
                @if($errors->has('costo_staff_fecha_3'))
                    <p class="help-block">
                        {{ $errors->first('costo_staff_fecha_3') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.listaDeEvento.fields.costo_staff_fecha_3_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection