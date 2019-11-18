<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySolicitudDeCambioDeGrupoRequest;
use App\Http\Requests\StoreSolicitudDeCambioDeGrupoRequest;
use App\Http\Requests\UpdateSolicitudDeCambioDeGrupoRequest;
use App\SolicitudDeCambioDeGrupo;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SolicitudDeCambioDeGrupoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = SolicitudDeCambioDeGrupo::with(['persona_a_cambiar'])->select(sprintf('%s.*', (new SolicitudDeCambioDeGrupo)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'solicitud_de_cambio_de_grupo_show';
                $editGate      = 'solicitud_de_cambio_de_grupo_edit';
                $deleteGate    = 'solicitud_de_cambio_de_grupo_delete';
                $crudRoutePart = 'solicitud-de-cambio-de-grupos';

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

            $table->editColumn('solicitante', function ($row) {
                return $row->solicitante ? $row->solicitante : "";
            });
            $table->addColumn('persona_a_cambiar_cum', function ($row) {
                return $row->persona_a_cambiar ? $row->persona_a_cambiar->cum : '';
            });

            $table->editColumn('persona_a_cambiar.name', function ($row) {
                return $row->persona_a_cambiar ? (is_string($row->persona_a_cambiar) ? $row->persona_a_cambiar : $row->persona_a_cambiar->name) : '';
            });
            $table->editColumn('persona_a_cambiar.apellido_paterno', function ($row) {
                return $row->persona_a_cambiar ? (is_string($row->persona_a_cambiar) ? $row->persona_a_cambiar : $row->persona_a_cambiar->apellido_paterno) : '';
            });
            $table->editColumn('persona_a_cambiar.grupo', function ($row) {
                return $row->persona_a_cambiar ? (is_string($row->persona_a_cambiar) ? $row->persona_a_cambiar : $row->persona_a_cambiar->grupo) : '';
            });
            $table->editColumn('grupo_saliente', function ($row) {
                return $row->grupo_saliente ? $row->grupo_saliente : "";
            });
            $table->editColumn('grupo_entrante', function ($row) {
                return $row->grupo_entrante ? $row->grupo_entrante : "";
            });
            $table->editColumn('observaciones_de_grupo_saliente', function ($row) {
                return $row->observaciones_de_grupo_saliente ? $row->observaciones_de_grupo_saliente : "";
            });

            $table->editColumn('cambio_realizado_por', function ($row) {
                return $row->cambio_realizado_por ? $row->cambio_realizado_por : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'persona_a_cambiar']);

            return $table->make(true);
        }

        return view('admin.solicitudDeCambioDeGrupos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('solicitud_de_cambio_de_grupo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $persona_a_cambiars = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.solicitudDeCambioDeGrupos.create', compact('persona_a_cambiars'));
    }

    public function store(StoreSolicitudDeCambioDeGrupoRequest $request)
    {
        $solicitudDeCambioDeGrupo = SolicitudDeCambioDeGrupo::create($request->all());

        return redirect()->route('admin.solicitud-de-cambio-de-grupos.index');
    }

    public function edit(SolicitudDeCambioDeGrupo $solicitudDeCambioDeGrupo)
    {
        abort_if(Gate::denies('solicitud_de_cambio_de_grupo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $persona_a_cambiars = User::all()->pluck('cum', 'id')->prepend(trans('global.pleaseSelect'), '');

        $solicitudDeCambioDeGrupo->load('persona_a_cambiar');

        return view('admin.solicitudDeCambioDeGrupos.edit', compact('persona_a_cambiars', 'solicitudDeCambioDeGrupo'));
    }

    public function update(UpdateSolicitudDeCambioDeGrupoRequest $request, SolicitudDeCambioDeGrupo $solicitudDeCambioDeGrupo)
    {
        $solicitudDeCambioDeGrupo->update($request->all());

        return redirect()->route('admin.solicitud-de-cambio-de-grupos.index');
    }

    public function show(SolicitudDeCambioDeGrupo $solicitudDeCambioDeGrupo)
    {
        abort_if(Gate::denies('solicitud_de_cambio_de_grupo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicitudDeCambioDeGrupo->load('persona_a_cambiar');

        return view('admin.solicitudDeCambioDeGrupos.show', compact('solicitudDeCambioDeGrupo'));
    }

    public function destroy(SolicitudDeCambioDeGrupo $solicitudDeCambioDeGrupo)
    {
        abort_if(Gate::denies('solicitud_de_cambio_de_grupo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicitudDeCambioDeGrupo->delete();

        return back();
    }

    public function massDestroy(MassDestroySolicitudDeCambioDeGrupoRequest $request)
    {
        SolicitudDeCambioDeGrupo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
