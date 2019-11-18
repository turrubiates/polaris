@extends('layouts.admin')
@section('content')
@can('actas_de_cop_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.actas-de-cops.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.actasDeCop.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.actasDeCop.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ActasDeCop">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.actasDeCop.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasDeCop.fields.numero_de_acta') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasDeCop.fields.fecha_de_convocatoria') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasDeCop.fields.provincia') }}
                    </th>
                    <th>
                        {{ trans('cruds.provincium.fields.nombre') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasDeCop.fields.lugar') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasDeCop.fields.fecha_de_acta') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasDeCop.fields.asistentes') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasDeCop.fields.vobo') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.name') }}
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
@can('actas_de_cop_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.actas-de-cops.massDestroy') }}",
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
    ajax: "{{ route('admin.actas-de-cops.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'numero_de_acta', name: 'numero_de_acta' },
{ data: 'fecha_de_convocatoria', name: 'fecha_de_convocatoria' },
{ data: 'provincia_nomenclatura', name: 'provincia.nomenclatura' },
{ data: 'provincia.nombre', name: 'provincia.nombre' },
{ data: 'lugar', name: 'lugar' },
{ data: 'fecha_de_acta', name: 'fecha_de_acta' },
{ data: 'asistentes', name: 'asistentes.cum' },
{ data: 'vobo_cum', name: 'vobo.cum' },
{ data: 'vobo.name', name: 'vobo.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  $('.datatable-ActasDeCop').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection