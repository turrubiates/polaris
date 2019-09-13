<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProvinciumRequest;
use App\Http\Requests\StoreProvinciumRequest;
use App\Http\Requests\UpdateProvinciumRequest;
use App\Provincium;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProvinciasController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('provincium_access'), 403);

        $provincia = Provincium::all();

        return view('admin.provincia.index', compact('provincia'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('provincium_create'), 403);

        return view('admin.provincia.create');
    }

    public function store(StoreProvinciumRequest $request)
    {
        abort_unless(\Gate::allows('provincium_create'), 403);

        $provincium = Provincium::create($request->all());

        return redirect()->route('admin.provincia.index');
    }

    public function edit(Provincium $provincium)
    {
        abort_unless(\Gate::allows('provincium_edit'), 403);

        return view('admin.provincia.edit', compact('provincium'));
    }

    public function update(UpdateProvinciumRequest $request, Provincium $provincium)
    {
        abort_unless(\Gate::allows('provincium_edit'), 403);

        $provincium->update($request->all());

        return redirect()->route('admin.provincia.index');
    }

    public function show(Provincium $provincium)
    {
        abort_unless(\Gate::allows('provincium_show'), 403);

        return view('admin.provincia.show', compact('provincium'));
    }

    public function destroy(Provincium $provincium)
    {
        abort_unless(\Gate::allows('provincium_delete'), 403);

        $provincium->delete();

        return back();
    }

    public function massDestroy(MassDestroyProvinciumRequest $request)
    {
        Provincium::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
