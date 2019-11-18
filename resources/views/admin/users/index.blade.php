@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'User', 'route' => 'admin.users.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-User">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.user.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.roles') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.cum') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.curp') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.apellido_paterno') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.apellido_materno') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.nacimiento') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.vigencia') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.sexo') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.ocupacion') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.miembro_desde') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.telefono_particular') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.telefono_oficina') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.domicilio') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.colonia') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.municipio') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.estado') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.religion') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.provincia') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.distrito') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.grupo') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.localidad') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.seccion') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.cargo') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.users.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'roles', name: 'roles.title' },
{ data: 'cum', name: 'cum' },
{ data: 'curp', name: 'curp' },
{ data: 'name', name: 'name' },
{ data: 'apellido_paterno', name: 'apellido_paterno' },
{ data: 'apellido_materno', name: 'apellido_materno' },
{ data: 'nacimiento', name: 'nacimiento' },
{ data: 'vigencia', name: 'vigencia' },
{ data: 'sexo', name: 'sexo' },
{ data: 'ocupacion', name: 'ocupacion' },
{ data: 'miembro_desde', name: 'miembro_desde' },
{ data: 'email', name: 'email' },
{ data: 'telefono_particular', name: 'telefono_particular' },
{ data: 'telefono_oficina', name: 'telefono_oficina' },
{ data: 'domicilio', name: 'domicilio' },
{ data: 'colonia', name: 'colonia' },
{ data: 'municipio', name: 'municipio' },
{ data: 'estado', name: 'estado' },
{ data: 'religion', name: 'religion' },
{ data: 'provincia', name: 'provincia' },
{ data: 'distrito', name: 'distrito' },
{ data: 'grupo', name: 'grupo' },
{ data: 'localidad', name: 'localidad' },
{ data: 'seccion', name: 'seccion' },
{ data: 'cargo', name: 'cargo' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 3, 'asc' ]],
    pageLength: 25,
  };
  $('.datatable-User').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection