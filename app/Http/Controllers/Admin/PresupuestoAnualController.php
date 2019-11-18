<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPresupuestoAnualRequest;
use App\Http\Requests\StorePresupuestoAnualRequest;
use App\Http\Requests\UpdatePresupuestoAnualRequest;
use App\PresupuestoAnual;
use App\Provincium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PresupuestoAnualController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('presupuesto_anual_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presupuestoAnuals = PresupuestoAnual::all();

        return view('admin.presupuestoAnuals.index', compact('presupuestoAnuals'));
    }

    public function create()
    {
        abort_if(Gate::denies('presupuesto_anual_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.presupuestoAnuals.create', compact('provincias'));
    }

    public function store(StorePresupuestoAnualRequest $request)
    {
        $presupuestoAnual = PresupuestoAnual::create($request->all());

        return redirect()->route('admin.presupuesto-anuals.index');
    }

    public function edit(PresupuestoAnual $presupuestoAnual)
    {
        abort_if(Gate::denies('presupuesto_anual_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $presupuestoAnual->load('provincia');

        return view('admin.presupuestoAnuals.edit', compact('provincias', 'presupuestoAnual'));
    }

    public function update(UpdatePresupuestoAnualRequest $request, PresupuestoAnual $presupuestoAnual)
    {
        $presupuestoAnual->update($request->all());

        return redirect()->route('admin.presupuesto-anuals.index');
    }

    public function show(PresupuestoAnual $presupuestoAnual)
    {
        abort_if(Gate::denies('presupuesto_anual_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presupuestoAnual->load('provincia');

        return view('admin.presupuestoAnuals.show', compact('presupuestoAnual'));
    }

    public function destroy(PresupuestoAnual $presupuestoAnual)
    {
        abort_if(Gate::denies('presupuesto_anual_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presupuestoAnual->delete();

        return back();
    }

    public function massDestroy(MassDestroyPresupuestoAnualRequest $request)
    {
        PresupuestoAnual::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
