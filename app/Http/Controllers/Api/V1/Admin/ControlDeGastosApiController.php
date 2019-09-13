<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ControlDeGasto;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreControlDeGastoRequest;
use App\Http\Requests\UpdateControlDeGastoRequest;

class ControlDeGastosApiController extends Controller
{
    public function index()
    {
        $controlDeGastos = ControlDeGasto::all();

        return $controlDeGastos;
    }

    public function store(StoreControlDeGastoRequest $request)
    {
        return ControlDeGasto::create($request->all());
    }

    public function update(UpdateControlDeGastoRequest $request, ControlDeGasto $controlDeGasto)
    {
        return $controlDeGasto->update($request->all());
    }

    public function show(ControlDeGasto $controlDeGasto)
    {
        return $controlDeGasto;
    }

    public function destroy(ControlDeGasto $controlDeGasto)
    {
        return $controlDeGasto->delete();
    }
}
