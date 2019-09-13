<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListaDeEventoRequest;
use App\Http\Requests\UpdateListaDeEventoRequest;
use App\ListaDeEvento;

class ListaDeEventosApiController extends Controller
{
    public function index()
    {
        $listaDeEventos = ListaDeEvento::all();

        return $listaDeEventos;
    }

    public function store(StoreListaDeEventoRequest $request)
    {
        return ListaDeEvento::create($request->all());
    }

    public function update(UpdateListaDeEventoRequest $request, ListaDeEvento $listaDeEvento)
    {
        return $listaDeEvento->update($request->all());
    }

    public function show(ListaDeEvento $listaDeEvento)
    {
        return $listaDeEvento;
    }

    public function destroy(ListaDeEvento $listaDeEvento)
    {
        return $listaDeEvento->delete();
    }
}
