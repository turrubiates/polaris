@extends('layouts.admin')
@section('content')
@can('lista_de_evento_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.lista-de-eventos.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.listaDeEvento.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.listaDeEvento.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ListaDeEvento">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.nombre_de_evento') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.responsable_de_evento') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.participantes') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.participantes_ml') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.participantes_ts') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.participantes_cc') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.participantes_cr') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.participantes_sd') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.participantes_ai') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.lugar_de_evento') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.inicio_de_evento') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.fin_de_evento') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.costo') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.fecha_de_pago_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.costo_participantes_fecha_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.listaDeEvento.fields.nivel') }}
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
@can('lista_de_evento_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.lista-de-eventos.massDestroy') }}",
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
    ajax: "{{ route('admin.lista-de-eventos.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'nombre_de_evento', name: 'nombre_de_evento' },
{ data: 'responsable_de_evento_cum', name: 'responsable_de_evento.cum' },
{ data: 'responsable_de_evento.name', name: 'responsable_de_evento.name' },
{ data: 'participantes', name: 'participantes' },
{ data: 'participantes_ml', name: 'participantes_ml' },
{ data: 'participantes_ts', name: 'participantes_ts' },
{ data: 'participantes_cc', name: 'participantes_cc' },
{ data: 'participantes_cr', name: 'participantes_cr' },
{ data: 'participantes_sd', name: 'participantes_sd' },
{ data: 'participantes_ai', name: 'participantes_ai' },
{ data: 'lugar_de_evento', name: 'lugar_de_evento' },
{ data: 'inicio_de_evento', name: 'inicio_de_evento' },
{ data: 'fin_de_evento', name: 'fin_de_evento' },
{ data: 'costo', name: 'costo' },
{ data: 'fecha_de_pago_1', name: 'fecha_de_pago_1' },
{ data: 'costo_participantes_fecha_1', name: 'costo_participantes_fecha_1' },
{ data: 'nivel', name: 'nivel' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 13, 'asc' ]],
    pageLength: 25,
  };
  $('.datatable-ListaDeEvento').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection