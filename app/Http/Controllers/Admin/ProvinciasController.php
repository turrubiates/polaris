<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProvinciumRequest;
use App\Http\Requests\StoreProvinciumRequest;
use App\Http\Requests\UpdateProvinciumRequest;
use App\Provincium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProvinciasController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Provincium::query()->select(sprintf('%s.*', (new Provincium)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'provincium_show';
                $editGate      = 'provincium_edit';
                $deleteGate    = 'provincium_delete';
                $crudRoutePart = 'provincia';

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
            $table->editColumn('nomenclatura', function ($row) {
                return $row->nomenclatura ? $row->nomenclatura : "";
            });
            $table->editColumn('nombre', function ($row) {
                return $row->nombre ? $row->nombre : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.provincia.index');
    }

    public function create()
    {
        abort_if(Gate::denies('provincium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provincia.create');
    }

    public function store(StoreProvinciumRequest $request)
    {
        $provincium = Provincium::create($request->all());

        return redirect()->route('admin.provincia.index');
    }

    public function edit(Provincium $provincium)
    {
        abort_if(Gate::denies('provincium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provincia.edit', compact('provincium'));
    }

    public function update(UpdateProvinciumRequest $request, Provincium $provincium)
    {
        $provincium->update($request->all());

        return redirect()->route('admin.provincia.index');
    }

    public function show(Provincium $provincium)
    {
        abort_if(Gate::denies('provincium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provincia.show', compact('provincium'));
    }

    public function destroy(Provincium $provincium)
    {
        abort_if(Gate::denies('provincium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provincium->delete();

        return back();
    }

    public function massDestroy(MassDestroyProvinciumRequest $request)
    {
        Provincium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
