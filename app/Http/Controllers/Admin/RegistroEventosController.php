<?php

namespace App\Http\Controllers\Admin;

use App\Grupo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRegistroEventoRequest;
use App\Http\Requests\StoreRegistroEventoRequest;
use App\Http\Requests\UpdateRegistroEventoRequest;
use App\ListaDeEvento;
use App\RegistroEvento;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RegistroEventosController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = RegistroEvento::with(['evento', 'grupo', 'participantes'])->select(sprintf('%s.*', (new RegistroEvento)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'registro_evento_show';
                $editGate      = 'registro_evento_edit';
                $deleteGate    = 'registro_evento_delete';
                $crudRoutePart = 'registro-eventos';

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
            $table->addColumn('evento_nombre_de_evento', function ($row) {
                return $row->evento ? $row->evento->nombre_de_evento : '';
            });

            $table->addColumn('grupo_grupo', function ($row) {
                return $row->grupo ? $row->grupo->grupo : '';
            });

            $table->editColumn('participantes', function ($row) {
                $labels = [];

                foreach ($row->participantes as $participante) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $participante->cum);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'evento', 'grupo', 'participantes']);

            return $table->make(true);
        }

        return view('admin.registroEventos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('registro_evento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventos = ListaDeEvento::all()->pluck('nombre_de_evento', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupos = Grupo::all()->pluck('grupo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $participantes = User::all()->pluck('cum', 'id');

        return view('admin.registroEventos.create', compact('eventos', 'grupos', 'participantes'));
    }

    public function store(StoreRegistroEventoRequest $request)
    {
        $registroEvento = RegistroEvento::create($request->all());
        $registroEvento->participantes()->sync($request->input('participantes', []));

        foreach ($request->input('comprobante_de_pago', []) as $file) {
            $registroEvento->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('comprobante_de_pago');
        }

        return redirect()->route('admin.registro-eventos.index');
    }

    public function edit(RegistroEvento $registroEvento)
    {
        abort_if(Gate::denies('registro_evento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventos = ListaDeEvento::all()->pluck('nombre_de_evento', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupos = Grupo::all()->pluck('grupo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $participantes = User::all()->pluck('cum', 'id');

        $registroEvento->load('evento', 'grupo', 'participantes');

        return view('admin.registroEventos.edit', compact('eventos', 'grupos', 'participantes', 'registroEvento'));
    }

    public function update(UpdateRegistroEventoRequest $request, RegistroEvento $registroEvento)
    {
        $registroEvento->update($request->all());
        $registroEvento->participantes()->sync($request->input('participantes', []));

        if (count($registroEvento->comprobante_de_pago) > 0) {
            foreach ($registroEvento->comprobante_de_pago as $media) {
                if (!in_array($media->file_name, $request->input('comprobante_de_pago', []))) {
                    $media->delete();
                }
            }
        }

        $media = $registroEvento->comprobante_de_pago->pluck('file_name')->toArray();

        foreach ($request->input('comprobante_de_pago', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $registroEvento->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('comprobante_de_pago');
            }
        }

        return redirect()->route('admin.registro-eventos.index');
    }

    public function show(RegistroEvento $registroEvento)
    {
        abort_if(Gate::denies('registro_evento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registroEvento->load('evento', 'grupo', 'participantes');

        return view('admin.registroEventos.show', compact('registroEvento'));
    }

    public function destroy(RegistroEvento $registroEvento)
    {
        abort_if(Gate::denies('registro_evento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registroEvento->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegistroEventoRequest $request)
    {
        RegistroEvento::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
