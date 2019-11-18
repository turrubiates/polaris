<?php

namespace App\Http\Controllers\Admin;

use App\Grupo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGrupoRequest;
use App\Http\Requests\StoreGrupoRequest;
use App\Http\Requests\UpdateGrupoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GruposController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Grupo::query()->select(sprintf('%s.*', (new Grupo)->table));
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

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('grupo', function ($row) {
                return $row->grupo ? $row->grupo : "";
            });
            $table->editColumn('nombre_de_grupo', function ($row) {
                return $row->nombre_de_grupo ? $row->nombre_de_grupo : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.grupos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('grupo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grupos.create');
    }

    public function store(StoreGrupoRequest $request)
    {
        $grupo = Grupo::create($request->all());

        return redirect()->route('admin.grupos.index');
    }

    public function edit(Grupo $grupo)
    {
        abort_if(Gate::denies('grupo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grupos.edit', compact('grupo'));
    }

    public function update(UpdateGrupoRequest $request, Grupo $grupo)
    {
        $grupo->update($request->all());

        return redirect()->route('admin.grupos.index');
    }

    public function show(Grupo $grupo)
    {
        abort_if(Gate::denies('grupo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grupos.show', compact('grupo'));
    }

    public function destroy(Grupo $grupo)
    {
        abort_if(Gate::denies('grupo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupo->delete();

        return back();
    }

    public function massDestroy(MassDestroyGrupoRequest $request)
    {
        Grupo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
