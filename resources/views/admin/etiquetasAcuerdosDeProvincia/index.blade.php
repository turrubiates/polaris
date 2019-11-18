@extends('layouts.admin')
@section('content')
@can('etiquetas_acuerdos_de_provincium_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.etiquetas-acuerdos-de-provincia.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.etiquetasAcuerdosDeProvincium.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.etiquetasAcuerdosDeProvincium.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-EtiquetasAcuerdosDeProvincium">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.etiquetasAcuerdosDeProvincium.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.etiquetasAcuerdosDeProvincium.fields.etiqueta_acuerdo_de_provincia') }}
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
@can('etiquetas_acuerdos_de_provincium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.etiquetas-acuerdos-de-provincia.massDestroy') }}",
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
    ajax: "{{ route('admin.etiquetas-acuerdos-de-provincia.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'etiqueta_acuerdo_de_provincia', name: 'etiqueta_acuerdo_de_provincia' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 2, 'desc' ]],
    pageLength: 25,
  };
  $('.datatable-EtiquetasAcuerdosDeProvincium').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection