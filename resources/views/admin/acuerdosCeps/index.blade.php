@extends('layouts.admin')
@section('content')
@can('acuerdos_cep_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.acuerdos-ceps.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.acuerdosCep.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.acuerdosCep.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-AcuerdosCep">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.acuerdosCep.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.acuerdosCep.fields.fecha') }}
                    </th>
                    <th>
                        {{ trans('cruds.acuerdosCep.fields.provincia') }}
                    </th>
                    <th>
                        {{ trans('cruds.provincium.fields.nombre') }}
                    </th>
                    <th>
                        {{ trans('cruds.acuerdosCep.fields.numero_de_acuerdo') }}
                    </th>
                    <th>
                        {{ trans('cruds.acuerdosCep.fields.descripcion_de_acuerdo') }}
                    </th>
                    <th>
                        {{ trans('cruds.acuerdosCep.fields.votos_a_favor') }}
                    </th>
                    <th>
                        {{ trans('cruds.acuerdosCep.fields.etiquetas') }}
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
@can('acuerdos_cep_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.acuerdos-ceps.massDestroy') }}",
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
    ajax: "{{ route('admin.acuerdos-ceps.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'fecha', name: 'fecha' },
{ data: 'provincia_nomenclatura', name: 'provincia.nomenclatura' },
{ data: 'provincia.nombre', name: 'provincia.nombre' },
{ data: 'numero_de_acuerdo', name: 'numero_de_acuerdo' },
{ data: 'descripcion_de_acuerdo', name: 'descripcion_de_acuerdo' },
{ data: 'votos_a_favor', name: 'votos_a_favors.cum' },
{ data: 'etiquetas', name: 'etiquetas.etiqueta_acuerdo_de_provincia' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  $('.datatable-AcuerdosCep').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection