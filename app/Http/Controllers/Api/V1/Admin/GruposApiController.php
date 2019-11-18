<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Grupo;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrupoRequest;
use App\Http\Requests\UpdateGrupoRequest;
use App\Http\Resources\Admin\GrupoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GruposApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grupo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GrupoResource(Grupo::all());
    }

    public function store(StoreGrupoRequest $request)
    {
        $grupo = Grupo::create($request->all());

        return (new GrupoResource($grupo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Grupo $grupo)
    {
        abort_if(Gate::denies('grupo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GrupoResource($grupo);
    }

    public function update(UpdateGrupoRequest $request, Grupo $grupo)
    {
        $grupo->update($request->all());

        return (new GrupoResource($grupo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Grupo $grupo)
    {
        abort_if(Gate::denies('grupo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grupo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
