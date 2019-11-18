@extends('layouts.admin')
@section('content')
@can('actas_cog_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.actas-cogs.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.actasCog.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.actasCog.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ActasCog">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.actasCog.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasCog.fields.numero_de_acta') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasCog.fields.fecha_de_convocatoria') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasCog.fields.provincia') }}
                    </th>
                    <th>
                        {{ trans('cruds.provincium.fields.nombre') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasCog.fields.grupo') }}
                    </th>
                    <th>
                        {{ trans('cruds.grupo.fields.nombre_de_grupo') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasCog.fields.lugar') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasCog.fields.fecha_de_acta') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasCog.fields.asistentes') }}
                    </th>
                    <th>
                        {{ trans('cruds.actasCog.fields.vobo') }}
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
@can('actas_cog_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.actas-cogs.massDestroy') }}",
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
    ajax: "{{ route('admin.actas-cogs.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'numero_de_acta', name: 'numero_de_acta' },
{ data: 'fecha_de_convocatoria', name: 'fecha_de_convocatoria' },
{ data: 'provincia_nomenclatura', name: 'provincia.nomenclatura' },
{ data: 'provincia.nombre', name: 'provincia.nombre' },
{ data: 'grupo_grupo', name: 'grupo.grupo' },
{ data: 'grupo.nombre_de_grupo', name: 'grupo.nombre_de_grupo' },
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
  $('.datatable-ActasCog').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection