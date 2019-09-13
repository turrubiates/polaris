<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyListaDeEventoRequest;
use App\Http\Requests\StoreListaDeEventoRequest;
use App\Http\Requests\UpdateListaDeEventoRequest;
use App\ListaDeEvento;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ListaDeEventosController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ListaDeEvento::query()->select('*');
            $query->with(['responsable_de_evento']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lista_de_evento_show';
                $editGate      = 'lista_de_evento_edit';
                $deleteGate    = 'lista_de_evento_delete';
                $crudRoutePart = 'lista-de-eventos';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
            $table->editColumn('nombre_de_evento', function ($row) {
                return $row->nombre_de_evento ? $row->nombre_de_evento : "";
            });
            $table->editColumn('nivel', function ($row) {
                return $row->nivel ? ListaDeEvento::NIVEL_SELECT[$row->nivel] : '';
            });
            $table->editColumn('participantes', function ($row) {
                return $row->participantes ? ListaDeEvento::PARTICIPANTES_SELECT[$row->participantes] : '';
            });
            $table->editColumn('lugar_de_evento', function ($row) {
                return $row->lugar_de_evento ? $row->lugar_de_evento : "";
            });

            $table->editColumn('user.responsable_de_evento', function ($row) {
                return $row->responsable_de_evento_id ? (is_string($row->responsable_de_evento) ? $row->responsable_de_evento : $row->responsable_de_evento->cum) : '';
            });
            $table->editColumn('responsable_de_evento.nombre', function ($row) {
                return $row->responsable_de_evento_id ? (is_string($row->responsable_de_evento) ? $row->responsable_de_evento : $row->responsable_de_evento->nombre) : '';
            });
            $table->editColumn('responsable_de_evento.apellido_paterno', function ($row) {
                return $row->responsable_de_evento_id ? (is_string($row->responsable_de_evento) ? $row->responsable_de_evento : $row->responsable_de_evento->apellido_paterno) : '';
            });
            $table->editColumn('costo', function ($row) {
                return $row->costo ? ListaDeEvento::COSTO_RADIO[$row->costo] : '';
            });

            $table->editColumn('costo_participantes_fecha_1', function ($row) {
                return $row->costo_participantes_fecha_1 ? $row->costo_participantes_fecha_1 : "";
            });
            $table->rawColumns(['actions', 'placeholder', 'responsable_de_evento']);

            return $table->make(true);
        }

        return view('admin.listaDeEventos.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('lista_de_evento_create'), 403);

        $responsable_de_eventos = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.listaDeEventos.create', compact('responsable_de_eventos'));
    }

    public function store(StoreListaDeEventoRequest $request)
    {
        abort_unless(\Gate::allows('lista_de_evento_create'), 403);

        $listaDeEvento = ListaDeEvento::create($request->all());

        return redirect()->route('admin.lista-de-eventos.index');
    }

    public function edit(ListaDeEvento $listaDeEvento)
    {
        abort_unless(\Gate::allows('lista_de_evento_edit'), 403);

        $responsable_de_eventos = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listaDeEvento->load('responsable_de_evento', 'team');

        return view('admin.listaDeEventos.edit', compact('responsable_de_eventos', 'listaDeEvento'));
    }

    public function update(UpdateListaDeEventoRequest $request, ListaDeEvento $listaDeEvento)
    {
        abort_unless(\Gate::allows('lista_de_evento_edit'), 403);

        $listaDeEvento->update($request->all());

        return redirect()->route('admin.lista-de-eventos.index');
    }

    public function show(ListaDeEvento $listaDeEvento)
    {
        abort_unless(\Gate::allows('lista_de_evento_show'), 403);

        $listaDeEvento->load('responsable_de_evento', 'team');

        return view('admin.listaDeEventos.show', compact('listaDeEvento'));
    }

    public function destroy(ListaDeEvento $listaDeEvento)
    {
        abort_unless(\Gate::allows('lista_de_evento_delete'), 403);

        $listaDeEvento->delete();

        return back();
    }

    public function massDestroy(MassDestroyListaDeEventoRequest $request)
    {
        ListaDeEvento::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
