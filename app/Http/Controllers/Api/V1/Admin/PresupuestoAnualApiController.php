<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePresupuestoAnualRequest;
use App\Http\Requests\UpdatePresupuestoAnualRequest;
use App\Http\Resources\Admin\PresupuestoAnualResource;
use App\PresupuestoAnual;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PresupuestoAnualApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('presupuesto_anual_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PresupuestoAnualResource(PresupuestoAnual::with(['provincia'])->get());
    }

    public function store(StorePresupuestoAnualRequest $request)
    {
        $presupuestoAnual = PresupuestoAnual::create($request->all());

        return (new PresupuestoAnualResource($presupuestoAnual))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PresupuestoAnual $presupuestoAnual)
    {
        abort_if(Gate::denies('presupuesto_anual_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PresupuestoAnualResource($presupuestoAnual->load(['provincia']));
    }

    public function update(UpdatePresupuestoAnualRequest $request, PresupuestoAnual $presupuestoAnual)
    {
        $presupuestoAnual->update($request->all());

        return (new PresupuestoAnualResource($presupuestoAnual))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PresupuestoAnual $presupuestoAnual)
    {
        abort_if(Gate::denies('presupuesto_anual_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presupuestoAnual->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
