<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ControlDeCheque;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreControlDeChequeRequest;
use App\Http\Requests\UpdateControlDeChequeRequest;

class ControlDeChequesApiController extends Controller
{
    public function index()
    {
        $controlDeCheques = ControlDeCheque::all();

        return $controlDeCheques;
    }

    public function store(StoreControlDeChequeRequest $request)
    {
        return ControlDeCheque::create($request->all());
    }

    public function update(UpdateControlDeChequeRequest $request, ControlDeCheque $controlDeCheque)
    {
        return $controlDeCheque->update($request->all());
    }

    public function show(ControlDeCheque $controlDeCheque)
    {
        return $controlDeCheque;
    }

    public function destroy(ControlDeCheque $controlDeCheque)
    {
        return $controlDeCheque->delete();
    }
}
