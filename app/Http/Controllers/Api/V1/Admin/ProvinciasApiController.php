<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProvinciumRequest;
use App\Http\Requests\UpdateProvinciumRequest;
use App\Provincium;

class ProvinciasApiController extends Controller
{
    public function index()
    {
        $provincia = Provincium::all();

        return $provincia;
    }

    public function store(StoreProvinciumRequest $request)
    {
        return Provincium::create($request->all());
    }

    public function update(UpdateProvinciumRequest $request, Provincium $provincium)
    {
        return $provincium->update($request->all());
    }

    public function show(Provincium $provincium)
    {
        return $provincium;
    }

    public function destroy(Provincium $provincium)
    {
        return $provincium->delete();
    }
}
