@extends('layouts.admin')
@section('content')
<div class="content">
    @can('movimientos_bancario_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.movimientos-bancarios.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.movimientosBancario.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'MovimientosBancario', 'route' => 'admin.movimientos-bancarios.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.movimientosBancario.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.movimientosBancario.fields.fecha_de_operacion') }}
                                </th>
                                <th>
                                    {{ trans('cruds.movimientosBancario.fields.referencia') }}
                                </th>
                                <th>
                                    {{ trans('cruds.movimientosBancario.fields.descripcion') }}
                                </th>
                                <th>
                                    {{ trans('cruds.movimientosBancario.fields.depositos') }}
                                </th>
                                <th>
                                    {{ trans('cruds.movimientosBancario.fields.retiros') }}
                                </th>
                                <th>
                                    {{ trans('cruds.movimientosBancario.fields.saldo') }}
                                </th>
                                <th>
                                    {{ trans('cruds.movimientosBancario.fields.numero_de_movimiento') }}
                                </th>
                                <th>
                                    {{ trans('cruds.movimientosBancario.fields.cheque') }}
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
    url: "{{ route('admin.movimientos-bancarios.massDestroy') }}",
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
@can('movimientos_bancario_delete')
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.movimientos-bancarios.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'fecha_de_operacion', name: 'fecha_de_operacion' },
{ data: 'listaDeEvento.referencia', name: 'referencia.referencia_de_pago' },
{ data: 'descripcion', name: 'descripcion' },
{ data: 'depositos', name: 'depositos' },
{ data: 'retiros', name: 'retiros' },
{ data: 'saldo', name: 'saldo' },
{ data: 'numero_de_movimiento', name: 'numero_de_movimiento' },
{ data: 'controlDeCheque.cheque', name: 'cheque.numero_de_cheque' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };

  $('.datatable').DataTable(dtOverrideGlobals);

});

</script>
@endsection