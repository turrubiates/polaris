@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.regnal.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.regnals.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('cum') ? 'has-error' : '' }}">
                <label for="cum">{{ trans('cruds.regnal.fields.cum') }}</label>
                <input type="text" id="cum" name="cum" class="form-control" value="{{ old('cum', isset($regnal) ? $regnal->cum : '') }}">
                @if($errors->has('cum'))
                    <p class="help-block">
                        {{ $errors->first('cum') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.cum_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('curp') ? 'has-error' : '' }}">
                <label for="curp">{{ trans('cruds.regnal.fields.curp') }}</label>
                <input type="text" id="curp" name="curp" class="form-control" value="{{ old('curp', isset($regnal) ? $regnal->curp : '') }}">
                @if($errors->has('curp'))
                    <p class="help-block">
                        {{ $errors->first('curp') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.curp_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">{{ trans('cruds.regnal.fields.nombre') }}</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($regnal) ? $regnal->nombre : '') }}">
                @if($errors->has('nombre'))
                    <p class="help-block">
                        {{ $errors->first('nombre') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.nombre_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('apellido_paterno') ? 'has-error' : '' }}">
                <label for="apellido_paterno">{{ trans('cruds.regnal.fields.apellido_paterno') }}</label>
                <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control" value="{{ old('apellido_paterno', isset($regnal) ? $regnal->apellido_paterno : '') }}">
                @if($errors->has('apellido_paterno'))
                    <p class="help-block">
                        {{ $errors->first('apellido_paterno') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.apellido_paterno_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('apellido_materno') ? 'has-error' : '' }}">
                <label for="apellido_materno">{{ trans('cruds.regnal.fields.apellido_materno') }}</label>
                <input type="text" id="apellido_materno" name="apellido_materno" class="form-control" value="{{ old('apellido_materno', isset($regnal) ? $regnal->apellido_materno : '') }}">
                @if($errors->has('apellido_materno'))
                    <p class="help-block">
                        {{ $errors->first('apellido_materno') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.apellido_materno_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('nacimiento') ? 'has-error' : '' }}">
                <label for="nacimiento">{{ trans('cruds.regnal.fields.nacimiento') }}</label>
                <input type="text" id="nacimiento" name="nacimiento" class="form-control date" value="{{ old('nacimiento', isset($regnal) ? $regnal->nacimiento : '') }}">
                @if($errors->has('nacimiento'))
                    <p class="help-block">
                        {{ $errors->first('nacimiento') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.nacimiento_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('vigencia') ? 'has-error' : '' }}">
                <label for="vigencia">{{ trans('cruds.regnal.fields.vigencia') }}</label>
                <input type="text" id="vigencia" name="vigencia" class="form-control date" value="{{ old('vigencia', isset($regnal) ? $regnal->vigencia : '') }}">
                @if($errors->has('vigencia'))
                    <p class="help-block">
                        {{ $errors->first('vigencia') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.vigencia_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sexo') ? 'has-error' : '' }}">
                <label for="sexo">{{ trans('cruds.regnal.fields.sexo') }}</label>
                <input type="text" id="sexo" name="sexo" class="form-control" value="{{ old('sexo', isset($regnal) ? $regnal->sexo : '') }}">
                @if($errors->has('sexo'))
                    <p class="help-block">
                        {{ $errors->first('sexo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.sexo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ocupacion') ? 'has-error' : '' }}">
                <label for="ocupacion">{{ trans('cruds.regnal.fields.ocupacion') }}</label>
                <input type="text" id="ocupacion" name="ocupacion" class="form-control" value="{{ old('ocupacion', isset($regnal) ? $regnal->ocupacion : '') }}">
                @if($errors->has('ocupacion'))
                    <p class="help-block">
                        {{ $errors->first('ocupacion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.ocupacion_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.regnal.fields.email') }}</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($regnal) ? $regnal->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('telefono_particular') ? 'has-error' : '' }}">
                <label for="telefono_particular">{{ trans('cruds.regnal.fields.telefono_particular') }}</label>
                <input type="text" id="telefono_particular" name="telefono_particular" class="form-control" value="{{ old('telefono_particular', isset($regnal) ? $regnal->telefono_particular : '') }}">
                @if($errors->has('telefono_particular'))
                    <p class="help-block">
                        {{ $errors->first('telefono_particular') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.telefono_particular_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('telefono_oficina') ? 'has-error' : '' }}">
                <label for="telefono_oficina">{{ trans('cruds.regnal.fields.telefono_oficina') }}</label>
                <input type="text" id="telefono_oficina" name="telefono_oficina" class="form-control" value="{{ old('telefono_oficina', isset($regnal) ? $regnal->telefono_oficina : '') }}">
                @if($errors->has('telefono_oficina'))
                    <p class="help-block">
                        {{ $errors->first('telefono_oficina') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.telefono_oficina_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('domicilio') ? 'has-error' : '' }}">
                <label for="domicilio">{{ trans('cruds.regnal.fields.domicilio') }}</label>
                <input type="text" id="domicilio" name="domicilio" class="form-control" value="{{ old('domicilio', isset($regnal) ? $regnal->domicilio : '') }}">
                @if($errors->has('domicilio'))
                    <p class="help-block">
                        {{ $errors->first('domicilio') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.domicilio_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('colonia') ? 'has-error' : '' }}">
                <label for="colonia">{{ trans('cruds.regnal.fields.colonia') }}</label>
                <input type="text" id="colonia" name="colonia" class="form-control" value="{{ old('colonia', isset($regnal) ? $regnal->colonia : '') }}">
                @if($errors->has('colonia'))
                    <p class="help-block">
                        {{ $errors->first('colonia') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.colonia_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('municipio') ? 'has-error' : '' }}">
                <label for="municipio">{{ trans('cruds.regnal.fields.municipio') }}</label>
                <input type="text" id="municipio" name="municipio" class="form-control" value="{{ old('municipio', isset($regnal) ? $regnal->municipio : '') }}">
                @if($errors->has('municipio'))
                    <p class="help-block">
                        {{ $errors->first('municipio') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.municipio_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                <label for="estado">{{ trans('cruds.regnal.fields.estado') }}</label>
                <input type="text" id="estado" name="estado" class="form-control" value="{{ old('estado', isset($regnal) ? $regnal->estado : '') }}">
                @if($errors->has('estado'))
                    <p class="help-block">
                        {{ $errors->first('estado') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.estado_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('miembro_desde') ? 'has-error' : '' }}">
                <label for="miembro_desde">{{ trans('cruds.regnal.fields.miembro_desde') }}</label>
                <input type="text" id="miembro_desde" name="miembro_desde" class="form-control date" value="{{ old('miembro_desde', isset($regnal) ? $regnal->miembro_desde : '') }}">
                @if($errors->has('miembro_desde'))
                    <p class="help-block">
                        {{ $errors->first('miembro_desde') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.miembro_desde_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('provincia') ? 'has-error' : '' }}">
                <label for="provincia">{{ trans('cruds.regnal.fields.provincia') }}</label>
                <input type="text" id="provincia" name="provincia" class="form-control" value="{{ old('provincia', isset($regnal) ? $regnal->provincia : '') }}">
                @if($errors->has('provincia'))
                    <p class="help-block">
                        {{ $errors->first('provincia') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.provincia_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('distrito') ? 'has-error' : '' }}">
                <label for="distrito">{{ trans('cruds.regnal.fields.distrito') }}</label>
                <input type="text" id="distrito" name="distrito" class="form-control" value="{{ old('distrito', isset($regnal) ? $regnal->distrito : '') }}">
                @if($errors->has('distrito'))
                    <p class="help-block">
                        {{ $errors->first('distrito') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.distrito_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('grupo') ? 'has-error' : '' }}">
                <label for="grupo">{{ trans('cruds.regnal.fields.grupo') }}</label>
                <input type="text" id="grupo" name="grupo" class="form-control" value="{{ old('grupo', isset($regnal) ? $regnal->grupo : '') }}">
                @if($errors->has('grupo'))
                    <p class="help-block">
                        {{ $errors->first('grupo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.grupo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('localidad') ? 'has-error' : '' }}">
                <label for="localidad">{{ trans('cruds.regnal.fields.localidad') }}</label>
                <input type="text" id="localidad" name="localidad" class="form-control" value="{{ old('localidad', isset($regnal) ? $regnal->localidad : '') }}">
                @if($errors->has('localidad'))
                    <p class="help-block">
                        {{ $errors->first('localidad') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.localidad_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('seccion') ? 'has-error' : '' }}">
                <label for="seccion">{{ trans('cruds.regnal.fields.seccion') }}</label>
                <input type="text" id="seccion" name="seccion" class="form-control" value="{{ old('seccion', isset($regnal) ? $regnal->seccion : '') }}">
                @if($errors->has('seccion'))
                    <p class="help-block">
                        {{ $errors->first('seccion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.seccion_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cargo') ? 'has-error' : '' }}">
                <label for="cargo">{{ trans('cruds.regnal.fields.cargo') }}</label>
                <input type="text" id="cargo" name="cargo" class="form-control" value="{{ old('cargo', isset($regnal) ? $regnal->cargo : '') }}">
                @if($errors->has('cargo'))
                    <p class="help-block">
                        {{ $errors->first('cargo') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.cargo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('religion') ? 'has-error' : '' }}">
                <label for="religion">{{ trans('cruds.regnal.fields.religion') }}</label>
                <input type="text" id="religion" name="religion" class="form-control" value="{{ old('religion', isset($regnal) ? $regnal->religion : '') }}">
                @if($errors->has('religion'))
                    <p class="help-block">
                        {{ $errors->first('religion') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.regnal.fields.religion_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection