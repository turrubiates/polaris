<?php

namespace App\Http\Controllers\Admin;

use App\ActasCog;
use App\Grupo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActasCogRequest;
use App\Http\Requests\StoreActasCogRequest;
use App\Http\Requests\UpdateActasCogRequest;
use App\Provincium;
use App\Team;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ActasCogController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ActasCog::with(['team', 'provincia', 'grupo', 'asistentes', 'vobo'])->select(sprintf('%s.*', (new ActasCog)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'actas_cog_show';
                $editGate      = 'actas_cog_edit';
                $deleteGate    = 'actas_cog_delete';
                $crudRoutePart = 'actas-cogs';

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
            $table->addColumn('grupo_grupo', function ($row) {
                return $row->grupo ? $row->grupo->grupo : '';
            });

            $table->editColumn('grupo.nombre_de_grupo', function ($row) {
                return $row->grupo ? (is_string($row->grupo) ? $row->grupo : $row->grupo->nombre_de_grupo) : '';
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

            $table->rawColumns(['actions', 'placeholder', 'provincia', 'grupo', 'asistentes', 'vobo']);

            return $table->make(true);
        }

        return view('admin.actasCogs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('actas_cog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupos = Grupo::all()->pluck('grupo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asistentes = User::all()->pluck('cum', 'id');

        $vobos = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.actasCogs.create', compact('teams', 'provincias', 'grupos', 'asistentes', 'vobos'));
    }

    public function store(StoreActasCogRequest $request)
    {
        $actasCog = ActasCog::create($request->all());
        $actasCog->asistentes()->sync($request->input('asistentes', []));

        if ($request->input('imagen_de_acta', false)) {
            $actasCog->addMedia(storage_path('tmp/uploads/' . $request->input('imagen_de_acta')))->toMediaCollection('imagen_de_acta');
        }

        return redirect()->route('admin.actas-cogs.index');
    }

    public function edit(ActasCog $actasCog)
    {
        abort_if(Gate::denies('actas_cog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupos = Grupo::all()->pluck('grupo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asistentes = User::all()->pluck('cum', 'id');

        $vobos = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actasCog->load('team', 'provincia', 'grupo', 'asistentes', 'vobo');

        return view('admin.actasCogs.edit', compact('teams', 'provincias', 'grupos', 'asistentes', 'vobos', 'actasCog'));
    }

    public function update(UpdateActasCogRequest $request, ActasCog $actasCog)
    {
        $actasCog->update($request->all());
        $actasCog->asistentes()->sync($request->input('asistentes', []));

        if ($request->input('imagen_de_acta', false)) {
            if (!$actasCog->imagen_de_acta || $request->input('imagen_de_acta') !== $actasCog->imagen_de_acta->file_name) {
                $actasCog->addMedia(storage_path('tmp/uploads/' . $request->input('imagen_de_acta')))->toMediaCollection('imagen_de_acta');
            }
        } elseif ($actasCog->imagen_de_acta) {
            $actasCog->imagen_de_acta->delete();
        }

        return redirect()->route('admin.actas-cogs.index');
    }

    public function show(ActasCog $actasCog)
    {
        abort_if(Gate::denies('actas_cog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actasCog->load('team', 'provincia', 'grupo', 'asistentes', 'vobo');

        return view('admin.actasCogs.show', compact('actasCog'));
    }

    public function destroy(ActasCog $actasCog)
    {
        abort_if(Gate::denies('actas_cog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actasCog->delete();

        return back();
    }

    public function massDestroy(MassDestroyActasCogRequest $request)
    {
        ActasCog::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
