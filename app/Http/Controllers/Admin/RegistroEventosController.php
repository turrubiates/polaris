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
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RegistroEventosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('registro_evento_access'), 403);

        $registroEventos = RegistroEvento::all();

        return view('admin.registroEventos.index', compact('registroEventos'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('registro_evento_create'), 403);

        $eventos = ListaDeEvento::all()->pluck('nombre_de_evento', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupos = Grupo::all()->pluck('grupo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $participantes_mls = User::all()->pluck('cum', 'id');

        return view('admin.registroEventos.create', compact('eventos', 'grupos', 'participantes_mls'));
    }

    public function store(StoreRegistroEventoRequest $request)
    {
        abort_unless(\Gate::allows('registro_evento_create'), 403);

        $registroEvento = RegistroEvento::create($request->all());
        $registroEvento->participantes_mls()->sync($request->input('participantes_mls', []));

        foreach ($request->input('comprobante_de_pago', []) as $file) {
            $registroEvento->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('comprobante_de_pago');
        }

        return redirect()->route('admin.registro-eventos.index');
    }

    public function edit(RegistroEvento $registroEvento)
    {
        abort_unless(\Gate::allows('registro_evento_edit'), 403);

        $eventos = ListaDeEvento::all()->pluck('nombre_de_evento', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grupos = Grupo::all()->pluck('grupo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $participantes_mls = User::all()->pluck('cum', 'id');

        $registroEvento->load('evento', 'grupo', 'participantes_mls');

        return view('admin.registroEventos.edit', compact('eventos', 'grupos', 'participantes_mls', 'registroEvento'));
    }

    public function update(UpdateRegistroEventoRequest $request, RegistroEvento $registroEvento)
    {
        abort_unless(\Gate::allows('registro_evento_edit'), 403);

        $registroEvento->update($request->all());
        $registroEvento->participantes_mls()->sync($request->input('participantes_mls', []));

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
        abort_unless(\Gate::allows('registro_evento_show'), 403);

        $registroEvento->load('evento', 'grupo', 'participantes_mls');

        return view('admin.registroEventos.show', compact('registroEvento'));
    }

    public function destroy(RegistroEvento $registroEvento)
    {
        abort_unless(\Gate::allows('registro_evento_delete'), 403);

        $registroEvento->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegistroEventoRequest $request)
    {
        RegistroEvento::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
