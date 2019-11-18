<?php

namespace App\Http\Controllers\Admin;

use App\ControlDeCheque;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMovimientosBancarioRequest;
use App\Http\Requests\StoreMovimientosBancarioRequest;
use App\Http\Requests\UpdateMovimientosBancarioRequest;
use App\MovimientosBancario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MovimientosBancariosController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = MovimientosBancario::with(['cheque'])->select(sprintf('%s.*', (new MovimientosBancario)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'movimientos_bancario_show';
                $editGate      = 'movimientos_bancario_edit';
                $deleteGate    = 'movimientos_bancario_delete';
                $crudRoutePart = 'movimientos-bancarios';

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

            $table->editColumn('referencia', function ($row) {
                return $row->referencia ? $row->referencia : "";
            });
            $table->editColumn('descripcion', function ($row) {
                return $row->descripcion ? $row->descripcion : "";
            });
            $table->editColumn('depositos', function ($row) {
                return $row->depositos ? $row->depositos : "";
            });
            $table->editColumn('retiros', function ($row) {
                return $row->retiros ? $row->retiros : "";
            });
            $table->editColumn('saldo', function ($row) {
                return $row->saldo ? $row->saldo : "";
            });
            $table->editColumn('numero_de_movimiento', function ($row) {
                return $row->numero_de_movimiento ? $row->numero_de_movimiento : "";
            });
            $table->addColumn('cheque_numero_de_cheque', function ($row) {
                return $row->cheque ? $row->cheque->numero_de_cheque : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'cheque']);

            return $table->make(true);
        }

        return view('admin.movimientosBancarios.index');
    }

    public function create()
    {
        abort_if(Gate::denies('movimientos_bancario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cheques = ControlDeCheque::all()->pluck('numero_de_cheque', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.movimientosBancarios.create', compact('cheques'));
    }

    public function store(StoreMovimientosBancarioRequest $request)
    {
        $movimientosBancario = MovimientosBancario::create($request->all());

        return redirect()->route('admin.movimientos-bancarios.index');
    }

    public function edit(MovimientosBancario $movimientosBancario)
    {
        abort_if(Gate::denies('movimientos_bancario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cheques = ControlDeCheque::all()->pluck('numero_de_cheque', 'id')->prepend(trans('global.pleaseSelect'), '');

        $movimientosBancario->load('cheque');

        return view('admin.movimientosBancarios.edit', compact('cheques', 'movimientosBancario'));
    }

    public function update(UpdateMovimientosBancarioRequest $request, MovimientosBancario $movimientosBancario)
    {
        $movimientosBancario->update($request->all());

        return redirect()->route('admin.movimientos-bancarios.index');
    }

    public function show(MovimientosBancario $movimientosBancario)
    {
        abort_if(Gate::denies('movimientos_bancario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $movimientosBancario->load('cheque');

        return view('admin.movimientosBancarios.show', compact('movimientosBancario'));
    }

    public function destroy(MovimientosBancario $movimientosBancario)
    {
        abort_if(Gate::denies('movimientos_bancario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $movimientosBancario->delete();

        return back();
    }

    public function massDestroy(MassDestroyMovimientosBancarioRequest $request)
    {
        MovimientosBancario::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
