<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRegnalRequest;
use App\Http\Requests\StoreRegnalRequest;
use App\Http\Requests\UpdateRegnalRequest;
use App\Regnal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RegnalController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Regnal::query()->select(sprintf('%s.*', (new Regnal)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'regnal_show';
                $editGate      = 'regnal_edit';
                $deleteGate    = 'regnal_delete';
                $crudRoutePart = 'regnals';

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
            $table->editColumn('cum', function ($row) {
                return $row->cum ? $row->cum : "";
            });
            $table->editColumn('curp', function ($row) {
                return $row->curp ? $row->curp : "";
            });
            $table->editColumn('nombre', function ($row) {
                return $row->nombre ? $row->nombre : "";
            });
            $table->editColumn('apellido_paterno', function ($row) {
                return $row->apellido_paterno ? $row->apellido_paterno : "";
            });
            $table->editColumn('apellido_materno', function ($row) {
                return $row->apellido_materno ? $row->apellido_materno : "";
            });

            $table->editColumn('sexo', function ($row) {
                return $row->sexo ? $row->sexo : "";
            });
            $table->editColumn('ocupacion', function ($row) {
                return $row->ocupacion ? $row->ocupacion : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('telefono_particular', function ($row) {
                return $row->telefono_particular ? $row->telefono_particular : "";
            });
            $table->editColumn('telefono_oficina', function ($row) {
                return $row->telefono_oficina ? $row->telefono_oficina : "";
            });
            $table->editColumn('domicilio', function ($row) {
                return $row->domicilio ? $row->domicilio : "";
            });
            $table->editColumn('colonia', function ($row) {
                return $row->colonia ? $row->colonia : "";
            });
            $table->editColumn('municipio', function ($row) {
                return $row->municipio ? $row->municipio : "";
            });
            $table->editColumn('estado', function ($row) {
                return $row->estado ? $row->estado : "";
            });

            $table->editColumn('provincia', function ($row) {
                return $row->provincia ? $row->provincia : "";
            });
            $table->editColumn('distrito', function ($row) {
                return $row->distrito ? $row->distrito : "";
            });
            $table->editColumn('grupo', function ($row) {
                return $row->grupo ? $row->grupo : "";
            });
            $table->editColumn('localidad', function ($row) {
                return $row->localidad ? $row->localidad : "";
            });
            $table->editColumn('seccion', function ($row) {
                return $row->seccion ? $row->seccion : "";
            });
            $table->editColumn('cargo', function ($row) {
                return $row->cargo ? $row->cargo : "";
            });
            $table->editColumn('religion', function ($row) {
                return $row->religion ? $row->religion : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.regnals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('regnal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regnals.create');
    }

    public function store(StoreRegnalRequest $request)
    {
        $regnal = Regnal::create($request->all());

        return redirect()->route('admin.regnals.index');
    }

    public function edit(Regnal $regnal)
    {
        abort_if(Gate::denies('regnal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regnals.edit', compact('regnal'));
    }

    public function update(UpdateRegnalRequest $request, Regnal $regnal)
    {
        $regnal->update($request->all());

        return redirect()->route('admin.regnals.index');
    }

    public function show(Regnal $regnal)
    {
        abort_if(Gate::denies('regnal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regnals.show', compact('regnal'));
    }

    public function destroy(Regnal $regnal)
    {
        abort_if(Gate::denies('regnal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regnal->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegnalRequest $request)
    {
        Regnal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
