<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistroEventoRequest;
use App\Http\Requests\UpdateRegistroEventoRequest;
use App\RegistroEvento;

class RegistroEventosApiController extends Controller
{
    public function index()
    {
        $registroEventos = RegistroEvento::all();

        return $registroEventos;
    }

    public function store(StoreRegistroEventoRequest $request)
    {
        return RegistroEvento::create($request->all());
    }

    public function update(UpdateRegistroEventoRequest $request, RegistroEvento $registroEvento)
    {
        return $registroEvento->update($request->all());
    }

    public function show(RegistroEvento $registroEvento)
    {
        return $registroEvento;
    }

    public function destroy(RegistroEvento $registroEvento)
    {
        $registroEvento->delete();

        return response("OK", 200);
    }
}
