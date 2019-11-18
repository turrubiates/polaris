@extends('layouts.admin')
@section('content')
@can('regnal_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.regnals.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.regnal.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Regnal', 'route' => 'admin.regnals.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.regnal.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Regnal">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.cum') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.curp') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.nombre') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.apellido_paterno') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.apellido_materno') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.nacimiento') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.vigencia') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.sexo') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.ocupacion') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.telefono_particular') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.telefono_oficina') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.domicilio') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.colonia') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.municipio') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.estado') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.miembro_desde') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.provincia') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.distrito') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.grupo') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.localidad') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.seccion') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.cargo') }}
                    </th>
                    <th>
                        {{ trans('cruds.regnal.fields.religion') }}
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
@can('regnal_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.regnals.massDestroy') }}",
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
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.regnals.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'cum', name: 'cum' },
{ data: 'curp', name: 'curp' },
{ data: 'nombre', name: 'nombre' },
{ data: 'apellido_paterno', name: 'apellido_paterno' },
{ data: 'apellido_materno', name: 'apellido_materno' },
{ data: 'nacimiento', name: 'nacimiento' },
{ data: 'vigencia', name: 'vigencia' },
{ data: 'sexo', name: 'sexo' },
{ data: 'ocupacion', name: 'ocupacion' },
{ data: 'email', name: 'email' },
{ data: 'telefono_particular', name: 'telefono_particular' },
{ data: 'telefono_oficina', name: 'telefono_oficina' },
{ data: 'domicilio', name: 'domicilio' },
{ data: 'colonia', name: 'colonia' },
{ data: 'municipio', name: 'municipio' },
{ data: 'estado', name: 'estado' },
{ data: 'miembro_desde', name: 'miembro_desde' },
{ data: 'provincia', name: 'provincia' },
{ data: 'distrito', name: 'distrito' },
{ data: 'grupo', name: 'grupo' },
{ data: 'localidad', name: 'localidad' },
{ data: 'seccion', name: 'seccion' },
{ data: 'cargo', name: 'cargo' },
{ data: 'religion', name: 'religion' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 2, 'asc' ]],
    pageLength: 100,
  };
  $('.datatable-Regnal').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection