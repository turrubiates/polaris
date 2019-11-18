<?php

namespace App\Http\Controllers\Admin;

use App\ControlDeCheque;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyControlDeChequeRequest;
use App\Http\Requests\StoreControlDeChequeRequest;
use App\Http\Requests\UpdateControlDeChequeRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ControlDeChequesController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ControlDeCheque::query()->select(sprintf('%s.*', (new ControlDeCheque)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'control_de_cheque_show';
                $editGate      = 'control_de_cheque_edit';
                $deleteGate    = 'control_de_cheque_delete';
                $crudRoutePart = 'control-de-cheques';

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
            $table->editColumn('cuenta', function ($row) {
                return $row->cuenta ? $row->cuenta : "";
            });
            $table->editColumn('numero_de_cheque', function ($row) {
                return $row->numero_de_cheque ? $row->numero_de_cheque : "";
            });
            $table->editColumn('nombre_a_quien_se_expide', function ($row) {
                return $row->nombre_a_quien_se_expide ? $row->nombre_a_quien_se_expide : "";
            });
            $table->editColumn('cantidad', function ($row) {
                return $row->cantidad ? $row->cantidad : "";
            });
            $table->editColumn('descripcion', function ($row) {
                return $row->descripcion ? $row->descripcion : "";
            });

            $table->editColumn('nombre_a_quien_se_entrego', function ($row) {
                return $row->nombre_a_quien_se_entrego ? $row->nombre_a_quien_se_entrego : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.controlDeCheques.index');
    }

    public function create()
    {
        abort_if(Gate::denies('control_de_cheque_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.controlDeCheques.create');
    }

    public function store(StoreControlDeChequeRequest $request)
    {
        $controlDeCheque = ControlDeCheque::create($request->all());

        if ($request->input('imagen_de_poliza', false)) {
            $controlDeCheque->addMedia(storage_path('tmp/uploads/' . $request->input('imagen_de_poliza')))->toMediaCollection('imagen_de_poliza');
        }

        return redirect()->route('admin.control-de-cheques.index');
    }

    public function edit(ControlDeCheque $controlDeCheque)
    {
        abort_if(Gate::denies('control_de_cheque_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.controlDeCheques.edit', compact('controlDeCheque'));
    }

    public function update(UpdateControlDeChequeRequest $request, ControlDeCheque $controlDeCheque)
    {
        $controlDeCheque->update($request->all());

        if ($request->input('imagen_de_poliza', false)) {
            if (!$controlDeCheque->imagen_de_poliza || $request->input('imagen_de_poliza') !== $controlDeCheque->imagen_de_poliza->file_name) {
                $controlDeCheque->addMedia(storage_path('tmp/uploads/' . $request->input('imagen_de_poliza')))->toMediaCollection('imagen_de_poliza');
            }
        } elseif ($controlDeCheque->imagen_de_poliza) {
            $controlDeCheque->imagen_de_poliza->delete();
        }

        return redirect()->route('admin.control-de-cheques.index');
    }

    public function show(ControlDeCheque $controlDeCheque)
    {
        abort_if(Gate::denies('control_de_cheque_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.controlDeCheques.show', compact('controlDeCheque'));
    }

    public function destroy(ControlDeCheque $controlDeCheque)
    {
        abort_if(Gate::denies('control_de_cheque_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $controlDeCheque->delete();

        return back();
    }

    public function massDestroy(MassDestroyControlDeChequeRequest $request)
    {
        ControlDeCheque::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
