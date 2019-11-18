<?php

namespace App\Http\Controllers\Admin;

use App\AcuerdosCep;
use App\EtiquetasAcuerdosDeProvincium;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAcuerdosCepRequest;
use App\Http\Requests\StoreAcuerdosCepRequest;
use App\Http\Requests\UpdateAcuerdosCepRequest;
use App\Provincium;
use App\Team;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AcuerdosCepController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = AcuerdosCep::with(['team', 'provincia', 'votos_a_favors', 'etiquetas'])->select(sprintf('%s.*', (new AcuerdosCep)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'acuerdos_cep_show';
                $editGate      = 'acuerdos_cep_edit';
                $deleteGate    = 'acuerdos_cep_delete';
                $crudRoutePart = 'acuerdos-ceps';

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

        return view('admin.acuerdosCeps.index');
    }

    public function create()
    {
        abort_if(Gate::denies('acuerdos_cep_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $votos_a_favors = User::all()->pluck('cum', 'id');

        $etiquetas = EtiquetasAcuerdosDeProvincium::all()->pluck('etiqueta_acuerdo_de_provincia', 'id');

        return view('admin.acuerdosCeps.create', compact('teams', 'provincias', 'votos_a_favors', 'etiquetas'));
    }

    public function store(StoreAcuerdosCepRequest $request)
    {
        $acuerdosCep = AcuerdosCep::create($request->all());
        $acuerdosCep->votos_a_favors()->sync($request->input('votos_a_favors', []));
        $acuerdosCep->etiquetas()->sync($request->input('etiquetas', []));

        return redirect()->route('admin.acuerdos-ceps.index');
    }

    public function edit(AcuerdosCep $acuerdosCep)
    {
        abort_if(Gate::denies('acuerdos_cep_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $votos_a_favors = User::all()->pluck('cum', 'id');

        $etiquetas = EtiquetasAcuerdosDeProvincium::all()->pluck('etiqueta_acuerdo_de_provincia', 'id');

        $acuerdosCep->load('team', 'provincia', 'votos_a_favors', 'etiquetas');

        return view('admin.acuerdosCeps.edit', compact('teams', 'provincias', 'votos_a_favors', 'etiquetas', 'acuerdosCep'));
    }

    public function update(UpdateAcuerdosCepRequest $request, AcuerdosCep $acuerdosCep)
    {
        $acuerdosCep->update($request->all());
        $acuerdosCep->votos_a_favors()->sync($request->input('votos_a_favors', []));
        $acuerdosCep->etiquetas()->sync($request->input('etiquetas', []));

        return redirect()->route('admin.acuerdos-ceps.index');
    }

    public function show(AcuerdosCep $acuerdosCep)
    {
        abort_if(Gate::denies('acuerdos_cep_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acuerdosCep->load('team', 'provincia', 'votos_a_favors', 'etiquetas');

        return view('admin.acuerdosCeps.show', compact('acuerdosCep'));
    }

    public function destroy(AcuerdosCep $acuerdosCep)
    {
        abort_if(Gate::denies('acuerdos_cep_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acuerdosCep->delete();

        return back();
    }

    public function massDestroy(MassDestroyAcuerdosCepRequest $request)
    {
        AcuerdosCep::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
