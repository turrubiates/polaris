<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Grupo;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrupoRequest;
use App\Http\Requests\UpdateGrupoRequest;

class GruposApiController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();

        return $grupos;
    }

    public function store(StoreGrupoRequest $request)
    {
        return Grupo::create($request->all());
    }

    public function update(UpdateGrupoRequest $request, Grupo $grupo)
    {
        return $grupo->update($request->all());
    }

    public function show(Grupo $grupo)
    {
        return $grupo;
    }

    public function destroy(Grupo $grupo)
    {
        return $grupo->delete();
    }
}
