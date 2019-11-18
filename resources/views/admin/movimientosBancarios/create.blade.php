@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.movimientosBancario.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.movimientos-bancarios.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('numero_de_cuenta') ? 'has-error' : '' }}">
                <label for="numero_de_cuenta">{{ trans('cruds.movimientosBancario.fields.numero_de_cuenta') }}*</label>
                <input type="number" id="numero_de_cuenta" name="numero_de_cuenta" class="form-control" value="{{ old('numero_de_cuenta', isset($movimientosBancario) ? $movimientosBancario->numero_de_cuenta : '') }}" step="1" required>
                @if($errors->has('numero_de_cuenta'))
                    <p class="help-block">
                        {{ $errors->first('numero_de_cuenta') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.movimientosBancario.fields.numero_de_cuenta_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fecha_de_operacion') ? 'has-error' : '' }}">
                <label for="fecha_de_operacion">{{ trans('cruds.movimientosBancario.fields.fecha_de_operacion') }}*</label>
                <input type="text" id="fecha_de_operacion" name="fecha_de_operacion" class="form-control date" value="{{ old('fecha_de_operacion', isset($movimientosBancario) ? $movimientosBancario->fecha_de_operacion : '') }}" required>
                @if($errors->has('fecha_de_operacion'))
                    <p class="help-block">
                        {{ $errors->first('fecha_de_operacion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.movimientosBancario.fields.fecha_de_operacion_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('referencia') ? 'has-error' : '' }}">
                <label for="referencia">{{ trans('cruds.movimientosBancario.fields.referencia') }}</label>
                <input type="number" id="referencia" name="referencia" class="form-control" value="{{ old('referencia', isset($movimientosBancario) ? $movimientosBancario->referencia : '') }}" step="1">
                @if($errors->has('referencia'))
                    <p class="help-block">
                        {{ $errors->first('referencia') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.movimientosBancario.fields.referencia_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">{{ trans('cruds.movimientosBancario.fields.descripcion') }}</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', isset($movimientosBancario) ? $movimientosBancario->descripcion : '') }}">
                @if($errors->has('descripcion'))
                    <p class="help-block">
                        {{ $errors->first('descripcion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.movimientosBancario.fields.descripcion_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('codigo_de_transaccion') ? 'has-error' : '' }}">
                <label for="codigo_de_transaccion">{{ trans('cruds.movimientosBancario.fields.codigo_de_transaccion') }}</label>
                <input type="text" id="codigo_de_transaccion" name="codigo_de_transaccion" class="form-control" value="{{ old('codigo_de_transaccion', isset($movimientosBancario) ? $movimientosBancario->codigo_de_transaccion : '') }}">
                @if($errors->has('codigo_de_transaccion'))
                    <p class="help-block">
                        {{ $errors->first('codigo_de_transaccion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.movimientosBancario.fields.codigo_de_transaccion_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sucursal') ? 'has-error' : '' }}">
                <label for="sucursal">{{ trans('cruds.movimientosBancario.fields.sucursal') }}</label>
                <input type="number" id="sucursal" name="sucursal" class="form-control" value="{{ old('sucursal', isset($movimientosBancario) ? $movimientosBancario->sucursal : '') }}" step="1">
                @if($errors->has('sucursal'))
                    <p class="help-block">
                        {{ $errors->first('sucursal') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.movimientosBancario.fields.sucursal_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('depositos') ? 'has-error' : '' }}">
                <label for="depositos">{{ trans('cruds.movimientosBancario.fields.depositos') }}</label>
                <input type="number" id="depositos" name="depositos" class="form-control" value="{{ old('depositos', isset($movimientosBancario) ? $movimientosBancario->depositos : '') }}" step="0.01">
                @if($errors->has('depositos'))
                    <p class="help-block">
                        {{ $errors->first('depositos') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.movimientosBancario.fields.depositos_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('retiros') ? 'has-error' : '' }}">
                <label for="retiros">{{ trans('cruds.movimientosBancario.fields.retiros') }}</label>
                <input type="number" id="retiros" name="retiros" class="form-control" value="{{ old('retiros', isset($movimientosBancario) ? $movimientosBancario->retiros : '') }}" step="0.01">
                @if($errors->has('retiros'))
                    <p class="help-block">
                        {{ $errors->first('retiros') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.movimientosBancario.fields.retiros_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('saldo') ? 'has-error' : '' }}">
                <label for="saldo">{{ trans('cruds.movimientosBancario.fields.saldo') }}</label>
                <input type="number" id="saldo" name="saldo" class="form-control" value="{{ old('saldo', isset($movimientosBancario) ? $movimientosBancario->saldo : '') }}" step="0.01">
                @if($errors->has('saldo'))
                    <p class="help-block">
                        {{ $errors->first('saldo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.movimientosBancario.fields.saldo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('numero_de_movimiento') ? 'has-error' : '' }}">
                <label for="numero_de_movimiento">{{ trans('cruds.movimientosBancario.fields.numero_de_movimiento') }}*</label>
                <input type="number" id="numero_de_movimiento" name="numero_de_movimiento" class="form-control" value="{{ old('numero_de_movimiento', isset($movimientosBancario) ? $movimientosBancario->numero_de_movimiento : '') }}" step="1" required>
                @if($errors->has('numero_de_movimiento'))
                    <p class="help-block">
                        {{ $errors->first('numero_de_movimiento') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.movimientosBancario.fields.numero_de_movimiento_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('descripcion_detallada') ? 'has-error' : '' }}">
                <label for="descripcion_detallada">{{ trans('cruds.movimientosBancario.fields.descripcion_detallada') }}</label>
                <input type="text" id="descripcion_detallada" name="descripcion_detallada" class="form-control" value="{{ old('descripcion_detallada', isset($movimientosBancario) ? $movimientosBancario->descripcion_detallada : '') }}">
                @if($errors->has('descripcion_detallada'))
                    <p class="help-block">
                        {{ $errors->first('descripcion_detallada') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.movimientosBancario.fields.descripcion_detallada_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cheque_id') ? 'has-error' : '' }}">
                <label for="cheque">{{ trans('cruds.movimientosBancario.fields.cheque') }}</label>
                <select name="cheque_id" id="cheque" class="form-control select2">
                    @foreach($cheques as $id => $cheque)
                        <option value="{{ $id }}" {{ (isset($movimientosBancario) && $movimientosBancario->cheque ? $movimientosBancario->cheque->id : old('cheque_id')) == $id ? 'selected' : '' }}>{{ $cheque }}</option>
                    @endforeach
                </select>
                @if($errors->has('cheque_id'))
                    <p class="help-block">
                        {{ $errors->first('cheque_id') }}
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