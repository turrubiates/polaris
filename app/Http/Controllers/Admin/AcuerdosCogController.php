<?php

namespace App\Http\Controllers\Admin;

use App\AcuerdosCog;
use App\EtiquetasAcuerdosDeProvincium;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAcuerdosCogRequest;
use App\Http\Requests\StoreAcuerdosCogRequest;
use App\Http\Requests\UpdateAcuerdosCogRequest;
use App\Provincium;
use App\Team;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AcuerdosCogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = AcuerdosCog::with(['team', 'provincia', 'votos_a_favors', 'etiquetas'])->select(sprintf('%s.*', (new AcuerdosCog)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'acuerdos_cog_show';
                $editGate      = 'acuerdos_cog_edit';
                $deleteGate    = 'acuerdos_cog_delete';
                $crudRoutePart = 'acuerdos-cogs';

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

            $table->addColumn('provincia_nomenclatura', function ($row) {
                return $row->provincia ? $row->provincia->nomenclatura : '';
            });

            $table->editColumn('provincia.nombre', function ($row) {
                return $row->provincia ? (is_string($row->provincia) ? $row->provincia : $row->provincia->nombre) : '';
            });
            $table->editColumn('numero_de_acuerdo', function ($row) {
                return $row->numero_de_acuerdo ? $row->numero_de_acuerdo : "";
            });
            $table->editColumn('descripcion_de_acuerdo', function ($row) {
                return $row->descripcion_de_acuerdo ? $row->descripcion_de_acuerdo : "";
            });
            $table->editColumn('votos_a_favor', function ($row) {
                $labels = [];

                foreach ($row->votos_a_favors as $votos_a_favor) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $votos_a_favor->cum);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('etiquetas', function ($row) {
                $labels = [];

                foreach ($row->etiquetas as $etiqueta) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $etiqueta->etiqueta_acuerdo_de_provincia);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'provincia', 'votos_a_favor', 'etiquetas']);

            return $table->make(true);
        }

        return view('admin.acuerdosCogs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('acuerdos_cog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $votos_a_favors = User::all()->pluck('cum', 'id');

        $etiquetas = EtiquetasAcuerdosDeProvincium::all()->pluck('etiqueta_acuerdo_de_provincia', 'id');

        return view('admin.acuerdosCogs.create', compact('teams', 'provincias', 'votos_a_favors', 'etiquetas'));
    }

    public function store(StoreAcuerdosCogRequest $request)
    {
        $acuerdosCog = AcuerdosCog::create($request->all());
        $acuerdosCog->votos_a_favors()->sync($request->input('votos_a_favors', []));
        $acuerdosCog->etiquetas()->sync($request->input('etiquetas', []));

        return redirect()->route('admin.acuerdos-cogs.index');
    }

    public function edit(AcuerdosCog $acuerdosCog)
    {
        abort_if(Gate::denies('acuerdos_cog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $votos_a_favors = User::all()->pluck('cum', 'id');

        $etiquetas = EtiquetasAcuerdosDeProvincium::all()->pluck('etiqueta_acuerdo_de_provincia', 'id');

        $acuerdosCog->load('team', 'provincia', 'votos_a_favors', 'etiquetas');

        return view('admin.acuerdosCogs.edit', compact('teams', 'provincias', 'votos_a_favors', 'etiquetas', 'acuerdosCog'));
    }

    public function update(UpdateAcuerdosCogRequest $request, AcuerdosCog $acuerdosCog)
    {
        $acuerdosCog->update($request->all());
        $acuerdosCog->votos_a_favors()->sync($request->input('votos_a_favors', []));
        $acuerdosCog->etiquetas()->sync($request->input('etiquetas', []));

        return redirect()->route('admin.acuerdos-cogs.index');
    }

    public function show(AcuerdosCog $acuerdosCog)
    {
        abort_if(Gate::denies('acuerdos_cog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acuerdosCog->load('team', 'provincia', 'votos_a_favors', 'etiquetas');

        return view('admin.acuerdosCogs.show', compact('acuerdosCog'));
    }

    public function destroy(AcuerdosCog $acuerdosCog)
    {
        abort_if(Gate::denies('acuerdos_cog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acuerdosCog->delete();

        return back();
    }

    public function massDestroy(MassDestroyAcuerdosCogRequest $request)
    {
        AcuerdosCog::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
