@extends('layouts.admin')
@section('content')
<div class="content">
    @can('registro_evento_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.registro-eventos.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.registroEvento.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.registroEvento.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.registroEvento.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registroEvento.fields.evento') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaDeEvento.fields.fecha_de_pago_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaDeEvento.fields.costo_participantes_fecha_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaDeEvento.fields.referencia_de_pago') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaDeEvento.fields.participantes') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaDeEvento.fields.adultos_responsables') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaDeEvento.fields.staff') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaDeEvento.fields.costo_adultos_fecha_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaDeEvento.fields.costo_staff_fecha_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.registroEvento.fields.grupo') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registroEventos as $key => $registroEvento)
                                    <tr data-entry-id="{{ $registroEvento->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $registroEvento->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registroEvento->evento->nombre_de_evento ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registroEvento->evento->fecha_de_pago_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registroEvento->evento->costo_participantes_fecha_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registroEvento->evento->referencia_de_pago ?? '' }}
                                        </td>
                                        <td>
                                            @if($registroEvento->evento)
                                                {{ $registroEvento->evento::PARTICIPANTES_SELECT[$registroEvento->evento->participantes] ?? '' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($registroEvento->evento)
                                                {{ $registroEvento->evento::ADULTOS_RESPONSABLES_SELECT[$registroEvento->evento->adultos_responsables] ?? '' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($registroEvento->evento)
                                                {{ $registroEvento->evento::STAFF_SELECT[$registroEvento->evento->staff] ?? '' }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $registroEvento->evento->costo_adultos_fecha_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registroEvento->evento->costo_staff_fecha_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $registroEvento->grupo->grupo ?? '' }}
                                        </td>
                                        <td>
                                            @can('registro_evento_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.registro-eventos.show', $registroEvento->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('registro_evento_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.registro-eventos.edit', $registroEvento->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
                                            @can('registro_evento_delete')
                                                <form action="{{ route('admin.registro-eventos.destroy', $registroEvento->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.registro-eventos.massDestroy') }}",
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  });
@can('registro_evento_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection