<?php

namespace App\Http\Controllers\Admin;

use App\AcuerdosCop;
use App\EtiquetasAcuerdosDeProvincium;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAcuerdosCopRequest;
use App\Http\Requests\StoreAcuerdosCopRequest;
use App\Http\Requests\UpdateAcuerdosCopRequest;
use App\Provincium;
use App\Team;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AcuerdosCopController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = AcuerdosCop::with(['team', 'provincia', 'votos_a_favors', 'etiquetas'])->select(sprintf('%s.*', (new AcuerdosCop)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'acuerdos_cop_show';
                $editGate      = 'acuerdos_cop_edit';
                $deleteGate    = 'acuerdos_cop_delete';
                $crudRoutePart = 'acuerdos-cops';

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

        return view('admin.acuerdosCops.index');
    }

    public function create()
    {
        abort_if(Gate::denies('acuerdos_cop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $votos_a_favors = User::all()->pluck('cum', 'id');

        $etiquetas = EtiquetasAcuerdosDeProvincium::all()->pluck('etiqueta_acuerdo_de_provincia', 'id');

        return view('admin.acuerdosCops.create', compact('teams', 'provincias', 'votos_a_favors', 'etiquetas'));
    }

    public function store(StoreAcuerdosCopRequest $request)
    {
        $acuerdosCop = AcuerdosCop::create($request->all());
        $acuerdosCop->votos_a_favors()->sync($request->input('votos_a_favors', []));
        $acuerdosCop->etiquetas()->sync($request->input('etiquetas', []));

        return redirect()->route('admin.acuerdos-cops.index');
    }

    public function edit(AcuerdosCop $acuerdosCop)
    {
        abort_if(Gate::denies('acuerdos_cop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Provincium::all()->pluck('nomenclatura', 'id')->prepend(trans('global.pleaseSelect'), '');

        $votos_a_favors = User::all()->pluck('cum', 'id');

        $etiquetas = EtiquetasAcuerdosDeProvincium::all()->pluck('etiqueta_acuerdo_de_provincia', 'id');

        $acuerdosCop->load('team', 'provincia', 'votos_a_favors', 'etiquetas');

        return view('admin.acuerdosCops.edit', compact('teams', 'provincias', 'votos_a_favors', 'etiquetas', 'acuerdosCop'));
    }

    public function update(UpdateAcuerdosCopRequest $request, AcuerdosCop $acuerdosCop)
    {
        $acuerdosCop->update($request->all());
        $acuerdosCop->votos_a_favors()->sync($request->input('votos_a_favors', []));
        $acuerdosCop->etiquetas()->sync($request->input('etiquetas', []));

        return redirect()->route('admin.acuerdos-cops.index');
    }

    public function show(AcuerdosCop $acuerdosCop)
    {
        abort_if(Gate::denies('acuerdos_cop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acuerdosCop->load('team', 'provincia', 'votos_a_favors', 'etiquetas');

        return view('admin.acuerdosCops.show', compact('acuerdosCop'));
    }

    public function destroy(AcuerdosCop $acuerdosCop)
    {
        abort_if(Gate::denies('acuerdos_cop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acuerdosCop->delete();

        return back();
    }

    public function massDestroy(MassDestroyAcuerdosCopRequest $request)
    {
        AcuerdosCop::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
