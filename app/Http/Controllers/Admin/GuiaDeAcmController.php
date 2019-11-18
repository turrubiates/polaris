<?php

namespace App\Http\Controllers\Admin;

use App\GuiaDeAcm;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuiaDeAcmRequest;
use App\Http\Requests\StoreGuiaDeAcmRequest;
use App\Http\Requests\UpdateGuiaDeAcmRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GuiaDeAcmController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = GuiaDeAcm::query()->select(sprintf('%s.*', (new GuiaDeAcm)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'guia_de_acm_show';
                $editGate      = 'guia_de_acm_edit';
                $deleteGate    = 'guia_de_acm_delete';
                $crudRoutePart = 'guia-de-acms';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('cargo', function ($row) {
                return $row->cargo ? $row->cargo : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.guiaDeAcms.index');
    }

    public function create()
    {
        abort_if(Gate::denies('guia_de_acm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.guiaDeAcms.create');
    }

    public function store(StoreGuiaDeAcmRequest $request)
    {
        $guiaDeAcm = GuiaDeAcm::create($request->all());

        return redirect()->route('admin.guia-de-acms.index');
    }

    public function edit(GuiaDeAcm $guiaDeAcm)
    {
        abort_if(Gate::denies('guia_de_acm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.guiaDeAcms.edit', compact('guiaDeAcm'));
    }

    public function update(UpdateGuiaDeAcmRequest $request, GuiaDeAcm $guiaDeAcm)
    {
        $guiaDeAcm->update($request->all());

        return redirect()->route('admin.guia-de-acms.index');
    }

    public function show(GuiaDeAcm $guiaDeAcm)
    {
        abort_if(Gate::denies('guia_de_acm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.guiaDeAcms.show', compact('guiaDeAcm'));
    }

    public function destroy(GuiaDeAcm $guiaDeAcm)
    {
        abort_if(Gate::denies('guia_de_acm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guiaDeAcm->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuiaDeAcmRequest $request)
    {
        GuiaDeAcm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
