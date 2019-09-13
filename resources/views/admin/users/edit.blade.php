@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                            <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <p class="help-block">
                                    {{ $errors->first('roles') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.roles_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('team_id') ? 'has-error' : '' }}">
                            <label for="team">{{ trans('cruds.user.fields.team') }}</label>
                            <select name="team_id" id="team" class="form-control select2">
                                @foreach($teams as $id => $team)
                                    <option value="{{ $id }}" {{ (isset($user) && $user->team ? $user->team->id : old('team_id')) == $id ? 'selected' : '' }}>{{ $team }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team_id'))
                                <p class="help-block">
                                    {{ $errors->first('team_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                            @if($errors->has('password'))
                                <p class="help-block">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.password_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('cum') ? 'has-error' : '' }}">
                            <label for="cum">{{ trans('cruds.user.fields.cum') }}</label>
                            <input type="text" id="cum" name="cum" class="form-control" value="{{ old('cum', isset($user) ? $user->cum : '') }}">
                            @if($errors->has('cum'))
                                <p class="help-block">
                                    {{ $errors->first('cum') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.cum_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('curp') ? 'has-error' : '' }}">
                            <label for="curp">{{ trans('cruds.user.fields.curp') }}</label>
                            <input type="text" id="curp" name="curp" class="form-control" value="{{ old('curp', isset($user) ? $user->curp : '') }}">
                            @if($errors->has('curp'))
                                <p class="help-block">
                                    {{ $errors->first('curp') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.curp_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label for="nombre">{{ trans('cruds.user.fields.nombre') }}</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($user) ? $user->nombre : '') }}">
                            @if($errors->has('nombre'))
                                <p class="help-block">
                                    {{ $errors->first('nombre') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.nombre_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('apellido_paterno') ? 'has-error' : '' }}">
                            <label for="apellido_paterno">{{ trans('cruds.user.fields.apellido_paterno') }}</label>
                            <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control" value="{{ old('apellido_paterno', isset($user) ? $user->apellido_paterno : '') }}">
                            @if($errors->has('apellido_paterno'))
                                <p class="help-block">
                                    {{ $errors->first('apellido_paterno') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.apellido_paterno_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('apellido_materno') ? 'has-error' : '' }}">
                            <label for="apellido_materno">{{ trans('cruds.user.fields.apellido_materno') }}</label>
                            <input type="text" id="apellido_materno" name="apellido_materno" class="form-control" value="{{ old('apellido_materno', isset($user) ? $user->apellido_materno : '') }}">
                            @if($errors->has('apellido_materno'))
                                <p class="help-block">
                                    {{ $errors->first('apellido_materno') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.apellido_materno_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('sexo') ? 'has-error' : '' }}">
                            <label for="sexo">{{ trans('cruds.user.fields.sexo') }}</label>
                            <input type="text" id="sexo" name="sexo" class="form-control" value="{{ old('sexo', isset($user) ? $user->sexo : '') }}">
                            @if($errors->has('sexo'))
                                <p class="help-block">
                                    {{ $errors->first('sexo') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.sexo_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('nacimiento') ? 'has-error' : '' }}">
                            <label for="nacimiento">{{ trans('cruds.user.fields.nacimiento') }}</label>
                            <input type="text" id="nacimiento" name="nacimiento" class="form-control date" value="{{ old('nacimiento', isset($user) ? $user->nacimiento : '') }}">
                            @if($errors->has('nacimiento'))
                                <p class="help-block">
                                    {{ $errors->first('nacimiento') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.nacimiento_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('vigencia') ? 'has-error' : '' }}">
                            <label for="vigencia">{{ trans('cruds.user.fields.vigencia') }}</label>
                            <input type="text" id="vigencia" name="vigencia" class="form-control date" value="{{ old('vigencia', isset($user) ? $user->vigencia : '') }}">
                            @if($errors->has('vigencia'))
                                <p class="help-block">
                                    {{ $errors->first('vigencia') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.vigencia_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('miembro_desde') ? 'has-error' : '' }}">
                            <label for="miembro_desde">{{ trans('cruds.user.fields.miembro_desde') }}</label>
                            <input type="text" id="miembro_desde" name="miembro_desde" class="form-control date" value="{{ old('miembro_desde', isset($user) ? $user->miembro_desde : '') }}">
                            @if($errors->has('miembro_desde'))
                                <p class="help-block">
                                    {{ $errors->first('miembro_desde') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.miembro_desde_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('ocupacion') ? 'has-error' : '' }}">
                            <label for="ocupacion">{{ trans('cruds.user.fields.ocupacion') }}</label>
                            <input type="text" id="ocupacion" name="ocupacion" class="form-control" value="{{ old('ocupacion', isset($user) ? $user->ocupacion : '') }}">
                            @if($errors->has('ocupacion'))
                                <p class="help-block">
                                    {{ $errors->first('ocupacion') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.ocupacion_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.email_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('telefono_particular') ? 'has-error' : '' }}">
                            <label for="telefono_particular">{{ trans('cruds.user.fields.telefono_particular') }}</label>
                            <input type="text" id="telefono_particular" name="telefono_particular" class="form-control" value="{{ old('telefono_particular', isset($user) ? $user->telefono_particular : '') }}">
                            @if($errors->has('telefono_particular'))
                                <p class="help-block">
                                    {{ $errors->first('telefono_particular') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.telefono_particular_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('telefono_oficina') ? 'has-error' : '' }}">
                            <label for="telefono_oficina">{{ trans('cruds.user.fields.telefono_oficina') }}</label>
                            <input type="text" id="telefono_oficina" name="telefono_oficina" class="form-control" value="{{ old('telefono_oficina', isset($user) ? $user->telefono_oficina : '') }}">
                            @if($errors->has('telefono_oficina'))
                                <p class="help-block">
                                    {{ $errors->first('telefono_oficina') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.telefono_oficina_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('domicilio') ? 'has-error' : '' }}">
                            <label for="domicilio">{{ trans('cruds.user.fields.domicilio') }}</label>
                            <input type="text" id="domicilio" name="domicilio" class="form-control" value="{{ old('domicilio', isset($user) ? $user->domicilio : '') }}">
                            @if($errors->has('domicilio'))
                                <p class="help-block">
                                    {{ $errors->first('domicilio') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.domicilio_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('colonia') ? 'has-error' : '' }}">
                            <label for="colonia">{{ trans('cruds.user.fields.colonia') }}</label>
                            <input type="text" id="colonia" name="colonia" class="form-control" value="{{ old('colonia', isset($user) ? $user->colonia : '') }}">
                            @if($errors->has('colonia'))
                                <p class="help-block">
                                    {{ $errors->first('colonia') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.colonia_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('municipio') ? 'has-error' : '' }}">
                            <label for="municipio">{{ trans('cruds.user.fields.municipio') }}</label>
                            <input type="text" id="municipio" name="municipio" class="form-control" value="{{ old('municipio', isset($user) ? $user->municipio : '') }}">
                            @if($errors->has('municipio'))
                                <p class="help-block">
                                    {{ $errors->first('municipio') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.municipio_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                            <label for="estado">{{ trans('cruds.user.fields.estado') }}</label>
                            <input type="text" id="estado" name="estado" class="form-control" value="{{ old('estado', isset($user) ? $user->estado : '') }}">
                            @if($errors->has('estado'))
                                <p class="help-block">
                                    {{ $errors->first('estado') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.estado_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('provincia') ? 'has-error' : '' }}">
                            <label for="provincia">{{ trans('cruds.user.fields.provincia') }}</label>
                            <input type="text" id="provincia" name="provincia" class="form-control" value="{{ old('provincia', isset($user) ? $user->provincia : '') }}">
                            @if($errors->has('provincia'))
                                <p class="help-block">
                                    {{ $errors->first('provincia') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.provincia_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('distrito') ? 'has-error' : '' }}">
                            <label for="distrito">{{ trans('cruds.user.fields.distrito') }}</label>
                            <input type="text" id="distrito" name="distrito" class="form-control" value="{{ old('distrito', isset($user) ? $user->distrito : '') }}">
                            @if($errors->has('distrito'))
                                <p class="help-block">
                                    {{ $errors->first('distrito') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.distrito_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('grupo') ? 'has-error' : '' }}">
                            <label for="grupo">{{ trans('cruds.user.fields.grupo') }}</label>
                            <input type="text" id="grupo" name="grupo" class="form-control" value="{{ old('grupo', isset($user) ? $user->grupo : '') }}">
                            @if($errors->has('grupo'))
                                <p class="help-block">
                                    {{ $errors->first('grupo') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.grupo_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('localidad') ? 'has-error' : '' }}">
                            <label for="localidad">{{ trans('cruds.user.fields.localidad') }}</label>
                            <input type="text" id="localidad" name="localidad" class="form-control" value="{{ old('localidad', isset($user) ? $user->localidad : '') }}">
                            @if($errors->has('localidad'))
                                <p class="help-block">
                                    {{ $errors->first('localidad') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.localidad_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('seccion') ? 'has-error' : '' }}">
                            <label for="seccion">{{ trans('cruds.user.fields.seccion') }}</label>
                            <input type="text" id="seccion" name="seccion" class="form-control" value="{{ old('seccion', isset($user) ? $user->seccion : '') }}">
                            @if($errors->has('seccion'))
                                <p class="help-block">
                                    {{ $errors->first('seccion') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.seccion_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('religion') ? 'has-error' : '' }}">
                            <label for="religion">{{ trans('cruds.user.fields.religion') }}</label>
                            <input type="text" id="religion" name="religion" class="form-control" value="{{ old('religion', isset($user) ? $user->religion : '') }}">
                            @if($errors->has('religion'))
                                <p class="help-block">
                                    {{ $errors->first('religion') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.religion_helper') }}
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