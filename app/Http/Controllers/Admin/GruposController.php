<?php

namespace App\Http\Controllers\Admin;

use App\Grupo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGrupoRequest;
use App\Http\Requests\StoreGrupoRequest;
use App\Http\Requests\UpdateGrupoRequest;
use App\Provincium;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GruposController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Grupo::query()->select('*');
            $query->with(['provincia']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'grupo_show';
                $editGate      = 'grupo_edit';
                $deleteGate    = 'grupo_delete';
                $crudRoutePart = 'grupos';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
            $table->editColumn('provincium.provincia', function ($row) {
                return $row->provincia_id ? (is_string($row->provincia) ? $row->provincia : $row->provincia->nombre) : '';
            });
            $table->editColumn('grupo', function ($row) {
                return $row->grupo ? $row->grupo : "";
            });
            $table->editColumn('nombre_de_grupo', function ($row) {
                return $row->nombre_de_grupo ? $row->nombre_de_grupo : "";
            });
            $table->rawColumns(['actions', 'placeholder', 'provincia']);

            return $table->make(true);
        }

        return view('admin.grupos.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('grupo_create'), 403);

        $provincias = Provincium::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.grupos.create', compact('provincias'));
    }

    public function store(StoreGrupoRequest $request)
    {
        abort_unless(\Gate::allows('grupo_create'), 403);

        $grupo = Grupo::create($request->all());

        return redirect()->route('admin.grupos.index');
    }

    public function edit(Grupo $grupo)
    {
        abort_unless(\Gate::allows('grupo_edit'), 403);

        $provincias = Provincium::all()->pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupo->load('provincia');

        return view('admin.grupos.edit', compact('provincias', 'grupo'));
    }

    public function update(UpdateGrupoRequest $request, Grupo $grupo)
    {
        abort_unless(\Gate::allows('grupo_edit'), 403);

        $grupo->update($request->all());

        return redirect()->route('admin.grupos.index');
    }

    public function show(Grupo $grupo)
    {
        abort_unless(\Gate::allows('grupo_show'), 403);

        $grupo->load('provincia');

        return view('admin.grupos.show', compact('grupo'));
    }

    public function destroy(Grupo $grupo)
    {
        abort_unless(\Gate::allows('grupo_delete'), 403);

        $grupo->delete();

        return back();
    }

    public function massDestroy(MassDestroyGrupoRequest $request)
    {
        Grupo::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
