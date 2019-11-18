<?php

namespace App\Http\Controllers\Admin;

use App\FichaMedica;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StoreFichaMedicaRequest;
use App\Http\Requests\UpdateFichaMedicaRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FichaMedicaController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = FichaMedica::with(['miembro'])->select(sprintf('%s.*', (new FichaMedica)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'ficha_medica_show';
                $editGate      = 'ficha_medica_edit';
                $deleteGate    = 'ficha_medica_delete';
                $crudRoutePart = 'ficha-medicas';

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
            $table->addColumn('miembro_cum', function ($row) {
                return $row->miembro ? $row->miembro->cum : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'miembro']);

            return $table->make(true);
        }

        return view('admin.fichaMedicas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ficha_medica_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $miembros = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.fichaMedicas.create', compact('miembros'));
    }

    public function store(StoreFichaMedicaRequest $request)
    {
        $fichaMedica = FichaMedica::create($request->all());

        return redirect()->route('admin.ficha-medicas.index');
    }

    public function edit(FichaMedica $fichaMedica)
    {
        abort_if(Gate::denies('ficha_medica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $miembros = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fichaMedica->load('miembro');

        return view('admin.fichaMedicas.edit', compact('miembros', 'fichaMedica'));
    }

    public function update(UpdateFichaMedicaRequest $request, FichaMedica $fichaMedica)
    {
        $fichaMedica->update($request->all());

        return redirect()->route('admin.ficha-medicas.index');
    }

    public function show(FichaMedica $fichaMedica)
    {
        abort_if(Gate::denies('ficha_medica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fichaMedica->load('miembro');

        return view('admin.fichaMedicas.show', compact('fichaMedica'));
    }
}
