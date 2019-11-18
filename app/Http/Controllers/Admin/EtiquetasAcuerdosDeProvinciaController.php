<?php

namespace App\Http\Controllers\Admin;

use App\EtiquetasAcuerdosDeProvincium;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEtiquetasAcuerdosDeProvinciumRequest;
use App\Http\Requests\StoreEtiquetasAcuerdosDeProvinciumRequest;
use App\Http\Requests\UpdateEtiquetasAcuerdosDeProvinciumRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EtiquetasAcuerdosDeProvinciaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = EtiquetasAcuerdosDeProvincium::query()->select(sprintf('%s.*', (new EtiquetasAcuerdosDeProvincium)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'etiquetas_acuerdos_de_provincium_show';
                $editGate      = 'etiquetas_acuerdos_de_provincium_edit';
                $deleteGate    = 'etiquetas_acuerdos_de_provincium_delete';
                $crudRoutePart = 'etiquetas-acuerdos-de-provincia';

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
            $table->editColumn('etiqueta_acuerdo_de_provincia', function ($row) {
                return $row->etiqueta_acuerdo_de_provincia ? $row->etiqueta_acuerdo_de_provincia : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.etiquetasAcuerdosDeProvincia.index');
    }

    public function create()
    {
        abort_if(Gate::denies('etiquetas_acuerdos_de_provincium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.etiquetasAcuerdosDeProvincia.create');
    }

    public function store(StoreEtiquetasAcuerdosDeProvinciumRequest $request)
    {
        $etiquetasAcuerdosDeProvincium = EtiquetasAcuerdosDeProvincium::create($request->all());

        return redirect()->route('admin.etiquetas-acuerdos-de-provincia.index');
    }

    public function edit(EtiquetasAcuerdosDeProvincium $etiquetasAcuerdosDeProvincium)
    {
        abort_if(Gate::denies('etiquetas_acuerdos_de_provincium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.etiquetasAcuerdosDeProvincia.edit', compact('etiquetasAcuerdosDeProvincium'));
    }

    public function update(UpdateEtiquetasAcuerdosDeProvinciumRequest $request, EtiquetasAcuerdosDeProvincium $etiquetasAcuerdosDeProvincium)
    {
        $etiquetasAcuerdosDeProvincium->update($request->all());

        return redirect()->route('admin.etiquetas-acuerdos-de-provincia.index');
    }

    public function show(EtiquetasAcuerdosDeProvincium $etiquetasAcuerdosDeProvincium)
    {
        abort_if(Gate::denies('etiquetas_acuerdos_de_provincium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.etiquetasAcuerdosDeProvincia.show', compact('etiquetasAcuerdosDeProvincium'));
    }

    public function destroy(EtiquetasAcuerdosDeProvincium $etiquetasAcuerdosDeProvincium)
    {
        abort_if(Gate::denies('etiquetas_acuerdos_de_provincium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $etiquetasAcuerdosDeProvincium->delete();

        return back();
    }

    public function massDestroy(MassDestroyEtiquetasAcuerdosDeProvinciumRequest $request)
    {
        EtiquetasAcuerdosDeProvincium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
