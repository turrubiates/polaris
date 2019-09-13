<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovimientosBancarioRequest;
use App\Http\Requests\UpdateMovimientosBancarioRequest;
use App\MovimientosBancario;

class MovimientosBancariosApiController extends Controller
{
    public function index()
    {
        $movimientosBancarios = MovimientosBancario::all();

        return $movimientosBancarios;
    }

    public function store(StoreMovimientosBancarioRequest $request)
    {
        return MovimientosBancario::create($request->all());
    }

    public function update(UpdateMovimientosBancarioRequest $request, MovimientosBancario $movimientosBancario)
    {
        return $movimientosBancario->update($request->all());
    }

    public function show(MovimientosBancario $movimientosBancario)
    {
        return $movimientosBancario;
    }

    public function destroy(MovimientosBancario $movimientosBancario)
    {
        return $movimientosBancario->delete();
    }
}
