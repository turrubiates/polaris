@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.listaDeEvento.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.lista-de-eventos.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nombre_de_evento') ? 'has-error' : '' }}">
                            <label for="nombre_de_evento">{{ trans('cruds.listaDeEvento.fields.nombre_de_evento') }}*</label>
                            <input type="text" id="nombre_de_evento" name="nombre_de_evento" class="form-control" value="{{ old('nombre_de_evento', isset($listaDeEvento) ? $listaDeEvento->nombre_de_evento : '0') }}" required>
                            @if($errors->has('nombre_de_evento'))
                                <p class="help-block">
                                    {{ $errors->first('nombre_de_evento') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.listaDeEvento.fields.nombre_de_evento_helper') }}
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
                        <div class="form-group {{ $errors->has('participantes') ? 'has-error' : '' }}">
                            <label for="participantes">{{ trans('cruds.listaDeEvento.fields.participantes') }}*</label>
                            <select id="participantes" name="participantes" class="form-control" required>
                                <option value="" disabled {{ old('participantes', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\ListaDeEvento::PARTICIPANTES_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('participantes', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('participantes'))
                                <p class="help-block">
                                    {{ $errors->first('participantes') }}
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
                        <div class="form-group {{ $errors->has('lugar_de_evento') ? 'has-error' : '' }}">
                            <label for="lugar_de_evento">{{ trans('cruds.listaDeEvento.fields.lugar_de_evento') }}</label>
                            <input type="text" id="lugar_de_evento" name="lugar_de_evento" class="form-control" value="{{ old('lugar_de_evento', isset($listaDeEvento) ? $listaDeEvento->lugar_de_evento : '0') }}">
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

        </div>
    </div>
</div>
@endsection