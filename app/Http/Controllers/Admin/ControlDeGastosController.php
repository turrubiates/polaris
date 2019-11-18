<?php

namespace App\Http\Controllers\Admin;

use App\ControlDeCheque;
use App\ControlDeGasto;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyControlDeGastoRequest;
use App\Http\Requests\StoreControlDeGastoRequest;
use App\Http\Requests\UpdateControlDeGastoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ControlDeGastosController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ControlDeGasto::with(['cheque'])->select(sprintf('%s.*', (new ControlDeGasto)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'control_de_gasto_show';
                $editGate      = 'control_de_gasto_edit';
                $deleteGate    = 'control_de_gasto_delete';
                $crudRoutePart = 'control-de-gastos';

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
            $table->addColumn('cheque_numero_de_cheque', function ($row) {
                return $row->cheque ? $row->cheque->numero_de_cheque : '';
            });

            $table->editColumn('descripcion', function ($row) {
                return $row->descripcion ? $row->descripcion : "";
            });
            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : "";
            });
            $table->editColumn('iva', function ($row) {
                return $row->iva ? $row->iva : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'cheque']);

            return $table->make(true);
        }

        return view('admin.controlDeGastos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('control_de_gasto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cheques = ControlDeCheque::all()->pluck('numero_de_cheque', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.controlDeGastos.create', compact('cheques'));
    }

    public function store(StoreControlDeGastoRequest $request)
    {
        $controlDeGasto = ControlDeGasto::create($request->all());

        foreach ($request->input('notas', []) as $file) {
            $controlDeGasto->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('notas');
        }

        if ($request->input('pdf', false)) {
            $controlDeGasto->addMedia(storage_path('tmp/uploads/' . $request->input('pdf')))->toMediaCollection('pdf');
        }

        if ($request->input('xml', false)) {
            $controlDeGasto->addMedia(storage_path('tmp/uploads/' . $request->input('xml')))->toMediaCollection('xml');
        }

        return redirect()->route('admin.control-de-gastos.index');
    }

    public function edit(ControlDeGasto $controlDeGasto)
    {
        abort_if(Gate::denies('control_de_gasto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cheques = ControlDeCheque::all()->pluck('numero_de_cheque', 'id')->prepend(trans('global.pleaseSelect'), '');

        $controlDeGasto->load('cheque');

        return view('admin.controlDeGastos.edit', compact('cheques', 'controlDeGasto'));
    }

    public function update(UpdateControlDeGastoRequest $request, ControlDeGasto $controlDeGasto)
    {
        $controlDeGasto->update($request->all());

        if (count($controlDeGasto->notas) > 0) {
            foreach ($controlDeGasto->notas as $media) {
                if (!in_array($media->file_name, $request->input('notas', []))) {
                    $media->delete();
                }
            }
        }

        $media = $controlDeGasto->notas->pluck('file_name')->toArray();

        foreach ($request->input('notas', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $controlDeGasto->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('notas');
            }
        }

        if ($request->input('pdf', false)) {
            if (!$controlDeGasto->pdf || $request->input('pdf') !== $controlDeGasto->pdf->file_name) {
                $controlDeGasto->addMedia(storage_path('tmp/uploads/' . $request->input('pdf')))->toMediaCollection('pdf');
            }
        } elseif ($controlDeGasto->pdf) {
            $controlDeGasto->pdf->delete();
        }

        if ($request->input('xml', false)) {
            if (!$controlDeGasto->xml || $request->input('xml') !== $controlDeGasto->xml->file_name) {
                $controlDeGasto->addMedia(storage_path('tmp/uploads/' . $request->input('xml')))->toMediaCollection('xml');
            }
        } elseif ($controlDeGasto->xml) {
            $controlDeGasto->xml->delete();
        }

        return redirect()->route('admin.control-de-gastos.index');
    }

    public function show(ControlDeGasto $controlDeGasto)
    {
        abort_if(Gate::denies('control_de_gasto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $controlDeGasto->load('cheque');

        return view('admin.controlDeGastos.show', compact('controlDeGasto'));
    }

    public function destroy(ControlDeGasto $controlDeGasto)
    {
        abort_if(Gate::denies('control_de_gasto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $controlDeGasto->delete();

        return back();
    }

    public function massDestroy(MassDestroyControlDeGastoRequest $request)
    {
        ControlDeGasto::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
