@extends('layouts.admin')
@section('content')
@can('solicitud_de_cambio_de_grupo_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.solicitud-de-cambio-de-grupos.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.solicitudDeCambioDeGrupo.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.solicitudDeCambioDeGrupo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-SolicitudDeCambioDeGrupo">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.solicitudDeCambioDeGrupo.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.solicitudDeCambioDeGrupo.fields.fecha_de_solicitud') }}
                    </th>
                    <th>
                        {{ trans('cruds.solicitudDeCambioDeGrupo.fields.solicitante') }}
                    </th>
                    <th>
                        {{ trans('cruds.solicitudDeCambioDeGrupo.fields.persona_a_cambiar') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.apellido_paterno') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.grupo') }}
                    </th>
                    <th>
                        {{ trans('cruds.solicitudDeCambioDeGrupo.fields.grupo_saliente') }}
                    </th>
                    <th>
                        {{ trans('cruds.solicitudDeCambioDeGrupo.fields.grupo_entrante') }}
                    </th>
                    <th>
                        {{ trans('cruds.solicitudDeCambioDeGrupo.fields.observaciones_de_grupo_saliente') }}
                    </th>
                    <th>
                        {{ trans('cruds.solicitudDeCambioDeGrupo.fields.fecha_de_cambio') }}
                    </th>
                    <th>
                        {{ trans('cruds.solicitudDeCambioDeGrupo.fields.cambio_realizado_por') }}
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
@can('solicitud_de_cambio_de_grupo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.solicitud-de-cambio-de-grupos.massDestroy') }}",
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
    ajax: "{{ route('admin.solicitud-de-cambio-de-grupos.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'fecha_de_solicitud', name: 'fecha_de_solicitud' },
{ data: 'solicitante', name: 'solicitante' },
{ data: 'persona_a_cambiar_cum', name: 'persona_a_cambiar.cum' },
{ data: 'persona_a_cambiar.name', name: 'persona_a_cambiar.name' },
{ data: 'persona_a_cambiar.apellido_paterno', name: 'persona_a_cambiar.apellido_paterno' },
{ data: 'persona_a_cambiar.grupo', name: 'persona_a_cambiar.grupo' },
{ data: 'grupo_saliente', name: 'grupo_saliente' },
{ data: 'grupo_entrante', name: 'grupo_entrante' },
{ data: 'observaciones_de_grupo_saliente', name: 'observaciones_de_grupo_saliente' },
{ data: 'fecha_de_cambio', name: 'fecha_de_cambio' },
{ data: 'cambio_realizado_por', name: 'cambio_realizado_por' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  $('.datatable-SolicitudDeCambioDeGrupo').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection