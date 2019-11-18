@extends('layouts.admin')
@section('content')
@can('presupuesto_anual_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.presupuesto-anuals.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.presupuestoAnual.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.presupuestoAnual.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PresupuestoAnual">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.provincia') }}
                        </th>
                        <th>
                            {{ trans('cruds.provincium.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.periodo') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.tipo') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.partida') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_ene') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_feb') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_mar') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_abr') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_may') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_jun') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_jul') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_ago') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_sep') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_oct') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_nov') }}
                        </th>
                        <th>
                            {{ trans('cruds.presupuestoAnual.fields.presupuestado_dic') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($presupuestoAnuals as $key => $presupuestoAnual)
                        <tr data-entry-id="{{ $presupuestoAnual->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $presupuestoAnual->id ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->provincia->nomenclatura ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->provincia->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->periodo ?? '' }}
                            </td>
                            <td>
                                {{ App\PresupuestoAnual::TIPO_RADIO[$presupuestoAnual->tipo] ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->partida ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->presupuestado_ene ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->presupuestado_feb ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->presupuestado_mar ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->presupuestado_abr ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->presupuestado_may ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->presupuestado_jun ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->presupuestado_jul ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->presupuestado_ago ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->presupuestado_sep ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->presupuestado_oct ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->presupuestado_nov ?? '' }}
                            </td>
                            <td>
                                {{ $presupuestoAnual->presupuestado_dic ?? '' }}
                            </td>
                            <td>
                                @can('presupuesto_anual_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.presupuesto-anuals.show', $presupuestoAnual->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('presupuesto_anual_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.presupuesto-anuals.edit', $presupuestoAnual->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('presupuesto_anual_delete')
                                    <form action="{{ route('admin.presupuesto-anuals.destroy', $presupuestoAnual->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('presupuesto_anual_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.presupuesto-anuals.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  $('.datatable-PresupuestoAnual:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection