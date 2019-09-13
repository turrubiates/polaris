@extends('layouts.admin')
@section('content')
<div class="content">
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
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
                        <thead>
                            <tr>
                                <th width="10">

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
                                    {{ trans('cruds.user.fields.nombre') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.apellido_paterno') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.apellido_materno') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.sexo') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.nacimiento') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.vigencia') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.miembro_desde') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.ocupacion') }}
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
                                    {{ trans('cruds.user.fields.religion') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }

  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.users.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'roles', name: 'roles.title' },
{ data: 'cum', name: 'cum' },
{ data: 'curp', name: 'curp' },
{ data: 'nombre', name: 'nombre' },
{ data: 'apellido_paterno', name: 'apellido_paterno' },
{ data: 'apellido_materno', name: 'apellido_materno' },
{ data: 'sexo', name: 'sexo' },
{ data: 'nacimiento', name: 'nacimiento' },
{ data: 'vigencia', name: 'vigencia' },
{ data: 'miembro_desde', name: 'miembro_desde' },
{ data: 'ocupacion', name: 'ocupacion' },
{ data: 'email', name: 'email' },
{ data: 'telefono_particular', name: 'telefono_particular' },
{ data: 'telefono_oficina', name: 'telefono_oficina' },
{ data: 'domicilio', name: 'domicilio' },
{ data: 'colonia', name: 'colonia' },
{ data: 'municipio', name: 'municipio' },
{ data: 'estado', name: 'estado' },
{ data: 'provincia', name: 'provincia' },
{ data: 'distrito', name: 'distrito' },
{ data: 'grupo', name: 'grupo' },
{ data: 'localidad', name: 'localidad' },
{ data: 'seccion', name: 'seccion' },
{ data: 'religion', name: 'religion' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };

  $('.datatable').DataTable(dtOverrideGlobals);

});

</script>
@endsection