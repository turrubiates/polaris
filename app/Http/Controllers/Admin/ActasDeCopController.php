<?php

namespace App\Http\Controllers\Admin;

use App\ActasDeCop;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActasDeCopRequest;
use App\Http\Requests\StoreActasDeCopRequest;
use App\Http\Requests\UpdateActasDeCopRequest;
use App\Provincium;
use App\Team;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ActasDeCopController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ActasDeCop::with(['team', 'provincia', 'asistentes', 'vobo'])->select(sprintf('%s.*', (new ActasDeCop)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'actas_de_cop_show';
                $editGate      = 'actas_de_cop_edit';
                $deleteGate    = 'actas_de_cop_delete';
                $crudRoutePart = 'actas-de-cops';

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

        return view('admin.actasDeCops.index');
    }

    public function create()
    {
        abort_if(Gate::denies('actas_de_cop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asistentes = User::all()->pluck('cum', 'id');

        $vobos = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.actasDeCops.create', compact('teams', 'provincias', 'asistentes', 'vobos'));
    }

    public function store(StoreActasDeCopRequest $request)
    {
        $actasDeCop = ActasDeCop::create($request->all());
        $actasDeCop->asistentes()->sync($request->input('asistentes', []));

        if ($request->input('imagen_de_acta', false)) {
            $actasDeCop->addMedia(storage_path('tmp/uploads/' . $request->input('imagen_de_acta')))->toMediaCollection('imagen_de_acta');
        }

        return redirect()->route('admin.actas-de-cops.index');
    }

    public function edit(ActasDeCop $actasDeCop)
    {
        abort_if(Gate::denies('actas_de_cop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asistentes = User::all()->pluck('cum', 'id');

        $vobos = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actasDeCop->load('team', 'provincia', 'asistentes', 'vobo');

        return view('admin.actasDeCops.edit', compact('teams', 'provincias', 'asistentes', 'vobos', 'actasDeCop'));
    }

    public function update(UpdateActasDeCopRequest $request, ActasDeCop $actasDeCop)
    {
        $actasDeCop->update($request->all());
        $actasDeCop->asistentes()->sync($request->input('asistentes', []));

        if ($request->input('imagen_de_acta', false)) {
            if (!$actasDeCop->imagen_de_acta || $request->input('imagen_de_acta') !== $actasDeCop->imagen_de_acta->file_name) {
                $actasDeCop->addMedia(storage_path('tmp/uploads/' . $request->input('imagen_de_acta')))->toMediaCollection('imagen_de_acta');
            }
        } elseif ($actasDeCop->imagen_de_acta) {
            $actasDeCop->imagen_de_acta->delete();
        }

        return redirect()->route('admin.actas-de-cops.index');
    }

    public function show(ActasDeCop $actasDeCop)
    {
        abort_if(Gate::denies('actas_de_cop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actasDeCop->load('team', 'provincia', 'asistentes', 'vobo');

        return view('admin.actasDeCops.show', compact('actasDeCop'));
    }

    public function destroy(ActasDeCop $actasDeCop)
    {
        abort_if(Gate::denies('actas_de_cop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actasDeCop->delete();

        return back();
    }

    public function massDestroy(MassDestroyActasDeCopRequest $request)
    {
        ActasDeCop::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
