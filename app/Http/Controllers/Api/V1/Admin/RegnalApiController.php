<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegnalRequest;
use App\Http\Requests\UpdateRegnalRequest;
use App\Http\Resources\Admin\RegnalResource;
use App\Regnal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegnalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('regnal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RegnalResource(Regnal::all());
    }

    public function store(StoreRegnalRequest $request)
    {
        $regnal = Regnal::create($request->all());

        return (new RegnalResource($regnal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Regnal $regnal)
    {
        abort_if(Gate::denies('regnal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RegnalResource($regnal);
    }

    public function update(UpdateRegnalRequest $request, Regnal $regnal)
    {
        $regnal->update($request->all());

        return (new RegnalResource($regnal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Regnal $regnal)
    {
        abort_if(Gate::denies('regnal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regnal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
