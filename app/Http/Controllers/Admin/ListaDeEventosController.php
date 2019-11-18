<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyListaDeEventoRequest;
use App\Http\Requests\StoreListaDeEventoRequest;
use App\Http\Requests\UpdateListaDeEventoRequest;
use App\ListaDeEvento;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ListaDeEventosController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ListaDeEvento::with(['responsable_de_evento'])->select(sprintf('%s.*', (new ListaDeEvento)->table));
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

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('nombre_de_evento', function ($row) {
                return $row->nombre_de_evento ? $row->nombre_de_evento : "";
            });
            $table->addColumn('responsable_de_evento_cum', function ($row) {
                return $row->responsable_de_evento ? $row->responsable_de_evento->cum : '';
            });

            $table->editColumn('responsable_de_evento.name', function ($row) {
                return $row->responsable_de_evento ? (is_string($row->responsable_de_evento) ? $row->responsable_de_evento : $row->responsable_de_evento->name) : '';
            });
            $table->editColumn('participantes', function ($row) {
                return $row->participantes ? ListaDeEvento::PARTICIPANTES_RADIO[$row->participantes] : '';
            });
            $table->editColumn('participantes_ml', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->participantes_ml ? 'checked' : null) . '>';
            });
            $table->editColumn('participantes_ts', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->participantes_ts ? 'checked' : null) . '>';
            });
            $table->editColumn('participantes_cc', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->participantes_cc ? 'checked' : null) . '>';
            });
            $table->editColumn('participantes_cr', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->participantes_cr ? 'checked' : null) . '>';
            });
            $table->editColumn('participantes_sd', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->participantes_sd ? 'checked' : null) . '>';
            });
            $table->editColumn('participantes_ai', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->participantes_ai ? 'checked' : null) . '>';
            });
            $table->editColumn('lugar_de_evento', function ($row) {
                return $row->lugar_de_evento ? $row->lugar_de_evento : "";
            });

            $table->editColumn('costo', function ($row) {
                return $row->costo ? ListaDeEvento::COSTO_RADIO[$row->costo] : '';
            });

            $table->editColumn('costo_participantes_fecha_1', function ($row) {
                return $row->costo_participantes_fecha_1 ? $row->costo_participantes_fecha_1 : "";
            });
            $table->editColumn('nivel', function ($row) {
                return $row->nivel ? ListaDeEvento::NIVEL_SELECT[$row->nivel] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'responsable_de_evento', 'participantes_ml', 'participantes_ts', 'participantes_cc', 'participantes_cr', 'participantes_sd', 'participantes_ai']);

            return $table->make(true);
        }

        return view('admin.listaDeEventos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lista_de_evento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsable_de_eventos = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.listaDeEventos.create', compact('responsable_de_eventos'));
    }

    public function store(StoreListaDeEventoRequest $request)
    {
        $listaDeEvento = ListaDeEvento::create($request->all());

        return redirect()->route('admin.lista-de-eventos.index');
    }

    public function edit(ListaDeEvento $listaDeEvento)
    {
        abort_if(Gate::denies('lista_de_evento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsable_de_eventos = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listaDeEvento->load('responsable_de_evento');

        return view('admin.listaDeEventos.edit', compact('responsable_de_eventos', 'listaDeEvento'));
    }

    public function update(UpdateListaDeEventoRequest $request, ListaDeEvento $listaDeEvento)
    {
        $listaDeEvento->update($request->all());

        return redirect()->route('admin.lista-de-eventos.index');
    }

    public function show(ListaDeEvento $listaDeEvento)
    {
        abort_if(Gate::denies('lista_de_evento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listaDeEvento->load('responsable_de_evento');

        return view('admin.listaDeEventos.show', compact('listaDeEvento'));
    }

    public function destroy(ListaDeEvento $listaDeEvento)
    {
        abort_if(Gate::denies('lista_de_evento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listaDeEvento->delete();

        return back();
    }

    public function massDestroy(MassDestroyListaDeEventoRequest $request)
    {
        ListaDeEvento::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
