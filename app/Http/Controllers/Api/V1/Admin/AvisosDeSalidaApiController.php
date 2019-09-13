<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\AvisosDeSalida;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAvisosDeSalidaRequest;
use App\Http\Requests\UpdateAvisosDeSalidaRequest;

class AvisosDeSalidaApiController extends Controller
{
    public function index()
    {
        $avisosDeSalidas = AvisosDeSalida::all();

        return $avisosDeSalidas;
    }

    public function store(StoreAvisosDeSalidaRequest $request)
    {
        return AvisosDeSalida::create($request->all());
    }

    public function update(UpdateAvisosDeSalidaRequest $request, AvisosDeSalida $avisosDeSalida)
    {
        return $avisosDeSalida->update($request->all());
    }

    public function show(AvisosDeSalida $avisosDeSalida)
    {
        return $avisosDeSalida;
    }

    public function destroy(AvisosDeSalida $avisosDeSalida)
    {
        return $avisosDeSalida->delete();
    }
}
