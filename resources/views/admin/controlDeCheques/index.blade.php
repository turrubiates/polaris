@extends('layouts.admin')
@section('content')
<div class="content">
    @can('control_de_cheque_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.control-de-cheques.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.controlDeCheque.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'ControlDeCheque', 'route' => 'admin.control-de-cheques.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.controlDeCheque.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.controlDeCheque.fields.numero_de_cheque') }}
                                </th>
                                <th>
                                    {{ trans('cruds.controlDeCheque.fields.nombre_a_quien_se_expide') }}
                                </th>
                                <th>
                                    {{ trans('cruds.controlDeCheque.fields.cantidad') }}
                                </th>
                                <th>
                                    {{ trans('cruds.controlDeCheque.fields.descripcion') }}
                                </th>
                                <th>
                                    {{ trans('cruds.controlDeCheque.fields.fecha_de_expedicion') }}
                                </th>
                                <th>
                                    {{ trans('cruds.controlDeCheque.fields.fecha_de_entrega') }}
                                </th>
                                <th>
                                    {{ trans('cruds.controlDeCheque.fields.nombre_a_quien_se_entrego') }}
                                </th>
                                <th>
                                    {{ trans('cruds.controlDeCheque.fields.fecha_de_cobro') }}
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
    url: "{{ route('admin.control-de-cheques.massDestroy') }}",
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
@can('control_de_cheque_delete')
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.control-de-cheques.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'numero_de_cheque', name: 'numero_de_cheque' },
{ data: 'nombre_a_quien_se_expide', name: 'nombre_a_quien_se_expide' },
{ data: 'cantidad', name: 'cantidad' },
{ data: 'descripcion', name: 'descripcion' },
{ data: 'fecha_de_expedicion', name: 'fecha_de_expedicion' },
{ data: 'fecha_de_entrega', name: 'fecha_de_entrega' },
{ data: 'nombre_a_quien_se_entrego', name: 'nombre_a_quien_se_entrego' },
{ data: 'fecha_de_cobro', name: 'fecha_de_cobro' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };

  $('.datatable').DataTable(dtOverrideGlobals);

});

</script>
@endsection