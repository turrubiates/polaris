@extends('layouts.admin')
@section('content')
<div class="content">
    @can('control_de_gasto_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.control-de-gastos.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.controlDeGasto.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'ControlDeGasto', 'route' => 'admin.control-de-gastos.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.controlDeGasto.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.controlDeGasto.fields.cheque') }}
                                </th>
                                <th>
                                    {{ trans('cruds.controlDeGasto.fields.descripcion') }}
                                </th>
                                <th>
                                    {{ trans('cruds.controlDeGasto.fields.evento') }}
                                </th>
                                <th>
                                    {{ trans('cruds.controlDeGasto.fields.total') }}
                                </th>
                                <th>
                                    {{ trans('cruds.controlDeGasto.fields.iva') }}
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
    url: "{{ route('admin.control-de-gastos.massDestroy') }}",
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
@can('control_de_gasto_delete')
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.control-de-gastos.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'controlDeCheque.cheque', name: 'cheque.numero_de_cheque' },
{ data: 'descripcion', name: 'descripcion' },
{ data: 'listaDeEvento.evento', name: 'evento.nombre_de_evento' },
{ data: 'total', name: 'total' },
{ data: 'iva', name: 'iva' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };

  $('.datatable').DataTable(dtOverrideGlobals);

});

</script>
@endsection