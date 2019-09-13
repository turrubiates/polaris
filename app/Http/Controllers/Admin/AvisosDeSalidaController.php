<?php

namespace App\Http\Controllers\Admin;

use App\AvisosDeSalida;
use App\Grupo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAvisosDeSalidaRequest;
use App\Http\Requests\StoreAvisosDeSalidaRequest;
use App\Http\Requests\UpdateAvisosDeSalidaRequest;
use App\ListaDeEvento;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AvisosDeSalidaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = AvisosDeSalida::query();
            $query->with(['evento', 'grupo']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'avisos_de_salida_show';
                $editGate      = 'avisos_de_salida_edit';
                $deleteGate    = 'avisos_de_salida_delete';
                $crudRoutePart = 'avisos-de-salidas';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
            $table->editColumn('listaDeEvento.evento', function ($row) {
                return $row->evento_id ? $row->evento->nombre_de_evento : '';
            });
            $table->editColumn('grupo.grupo', function ($row) {
                return $row->grupo_id ? $row->grupo->grupo : '';
            });
            $table->rawColumns(['actions', 'placeholder', 'evento', 'grupo']);

            return $table->make(true);
        }

        return view('admin.avisosDeSalidas.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('avisos_de_salida_create'), 403);

        $eventos = ListaDeEvento::all()->pluck('nombre_de_evento', 'id')->prepend(trans('global.pleaseSelect'), '');

        $participantes = User::all()->pluck('cum', 'id');

        $grupos = Grupo::all()->pluck('grupo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.avisosDeSalidas.create', compact('eventos', 'participantes', 'grupos'));
    }

    public function store(StoreAvisosDeSalidaRequest $request)
    {
        abort_unless(\Gate::allows('avisos_de_salida_create'), 403);

        $avisosDeSalida = AvisosDeSalida::create($request->all());
        $avisosDeSalida->participantes()->sync($request->input('participantes', []));

        return redirect()->route('admin.avisos-de-salidas.index');
    }

    public function edit(AvisosDeSalida $avisosDeSalida)
    {
        abort_unless(\Gate::allows('avisos_de_salida_edit'), 403);

        $eventos = ListaDeEvento::all()->pluck('nombre_de_evento', 'id')->prepend(trans('global.pleaseSelect'), '');

        $participantes = User::all()->pluck('cum', 'id');

        $grupos = Grupo::all()->pluck('grupo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $avisosDeSalida->load('evento', 'participantes', 'team', 'grupo');

        return view('admin.avisosDeSalidas.edit', compact('eventos', 'participantes', 'grupos', 'avisosDeSalida'));
    }

    public function update(UpdateAvisosDeSalidaRequest $request, AvisosDeSalida $avisosDeSalida)
    {
        abort_unless(\Gate::allows('avisos_de_salida_edit'), 403);

        $avisosDeSalida->update($request->all());
        $avisosDeSalida->participantes()->sync($request->input('participantes', []));

        return redirect()->route('admin.avisos-de-salidas.index');
    }

    public function show(AvisosDeSalida $avisosDeSalida)
    {
        abort_unless(\Gate::allows('avisos_de_salida_show'), 403);

        $avisosDeSalida->load('evento', 'participantes', 'team', 'grupo');

        return view('admin.avisosDeSalidas.show', compact('avisosDeSalida'));
    }

    public function destroy(AvisosDeSalida $avisosDeSalida)
    {
        abort_unless(\Gate::allows('avisos_de_salida_delete'), 403);

        $avisosDeSalida->delete();

        return back();
    }

    public function massDestroy(MassDestroyAvisosDeSalidaRequest $request)
    {
        AvisosDeSalida::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
