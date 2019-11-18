<?php

namespace App\Http\Controllers\Admin;

use App\ActasCep;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActasCepRequest;
use App\Http\Requests\StoreActasCepRequest;
use App\Http\Requests\UpdateActasCepRequest;
use App\Provincium;
use App\Team;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ActasCepController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ActasCep::with(['team', 'provincia', 'asistentes', 'vobo'])->select(sprintf('%s.*', (new ActasCep)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'actas_cep_show';
                $editGate      = 'actas_cep_edit';
                $deleteGate    = 'actas_cep_delete';
                $crudRoutePart = 'actas-ceps';

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
            $table->editColumn('numero_de_acta', function ($row) {
                return $row->numero_de_acta ? $row->numero_de_acta : "";
            });

            $table->addColumn('provincia_nomenclatura', function ($row) {
                return $row->provincia ? $row->provincia->nomenclatura : '';
            });

            $table->editColumn('provincia.nombre', function ($row) {
                return $row->provincia ? (is_string($row->provincia) ? $row->provincia : $row->provincia->nombre) : '';
            });
            $table->editColumn('lugar', function ($row) {
                return $row->lugar ? $row->lugar : "";
            });

            $table->editColumn('asistentes', function ($row) {
                $labels = [];

                foreach ($row->asistentes as $asistente) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $asistente->cum);
                }

                return implode(' ', $labels);
            });
            $table->addColumn('vobo_cum', function ($row) {
                return $row->vobo ? $row->vobo->cum : '';
            });

            $table->editColumn('vobo.name', function ($row) {
                return $row->vobo ? (is_string($row->vobo) ? $row->vobo : $row->vobo->name) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'provincia', 'asistentes', 'vobo']);

            return $table->make(true);
        }

        return view('admin.actasCeps.index');
    }

    public function create()
    {
        abort_if(Gate::denies('actas_cep_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asistentes = User::all()->pluck('cum', 'id');

        $vobos = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.actasCeps.create', compact('teams', 'provincias', 'asistentes', 'vobos'));
    }

    public function store(StoreActasCepRequest $request)
    {
        $actasCep = ActasCep::create($request->all());
        $actasCep->asistentes()->sync($request->input('asistentes', []));

        if ($request->input('imagen_de_acta', false)) {
            $actasCep->addMedia(storage_path('tmp/uploads/' . $request->input('imagen_de_acta')))->toMediaCollection('imagen_de_acta');
        }

        return redirect()->route('admin.actas-ceps.index');
    }

    public function edit(ActasCep $actasCep)
    {
        abort_if(Gate::denies('actas_cep_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asistentes = User::all()->pluck('cum', 'id');

        $vobos = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actasCep->load('team', 'provincia', 'asistentes', 'vobo');

        return view('admin.actasCeps.edit', compact('teams', 'provincias', 'asistentes', 'vobos', 'actasCep'));
    }

    public function update(UpdateActasCepRequest $request, ActasCep $actasCep)
    {
        $actasCep->update($request->all());
        $actasCep->asistentes()->sync($request->input('asistentes', []));

        if ($request->input('imagen_de_acta', false)) {
            if (!$actasCep->imagen_de_acta || $request->input('imagen_de_acta') !== $actasCep->imagen_de_acta->file_name) {
                $actasCep->addMedia(storage_path('tmp/uploads/' . $request->input('imagen_de_acta')))->toMediaCollection('imagen_de_acta');
            }
        } elseif ($actasCep->imagen_de_acta) {
            $actasCep->imagen_de_acta->delete();
        }

        return redirect()->route('admin.actas-ceps.index');
    }

    public function show(ActasCep $actasCep)
    {
        abort_if(Gate::denies('actas_cep_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actasCep->load('team', 'provincia', 'asistentes', 'vobo');

        return view('admin.actasCeps.show', compact('actasCep'));
    }

    public function destroy(ActasCep $actasCep)
    {
        abort_if(Gate::denies('actas_cep_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actasCep->delete();

        return back();
    }

    public function massDestroy(MassDestroyActasCepRequest $request)
    {
        ActasCep::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
