<?php

namespace App\Http\Controllers\Admin;

use App\ControlDeCheque;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMovimientosBancarioRequest;
use App\Http\Requests\StoreMovimientosBancarioRequest;
use App\Http\Requests\UpdateMovimientosBancarioRequest;
use App\ListaDeEvento;
use App\MovimientosBancario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MovimientosBancariosController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = MovimientosBancario::query();
            $query->with(['referencia', 'cheque']);
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

            $table->editColumn('listaDeEvento.referencia', function ($row) {
                return $row->referencia_id ? $row->referencia->referencia_de_pago : '';
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
            $table->editColumn('controlDeCheque.cheque', function ($row) {
                return $row->cheque_id ? $row->cheque->numero_de_cheque : '';
            });
            $table->rawColumns(['actions', 'placeholder', 'referencia', 'cheque']);

            return $table->make(true);
        }

        return view('admin.movimientosBancarios.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('movimientos_bancario_create'), 403);

        $referencias = ListaDeEvento::all()->pluck('referencia_de_pago', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cheques = ControlDeCheque::all()->pluck('numero_de_cheque', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.movimientosBancarios.create', compact('referencias', 'cheques'));
    }

    public function store(StoreMovimientosBancarioRequest $request)
    {
        abort_unless(\Gate::allows('movimientos_bancario_create'), 403);

        $movimientosBancario = MovimientosBancario::create($request->all());

        return redirect()->route('admin.movimientos-bancarios.index');
    }

    public function edit(MovimientosBancario $movimientosBancario)
    {
        abort_unless(\Gate::allows('movimientos_bancario_edit'), 403);

        $referencias = ListaDeEvento::all()->pluck('referencia_de_pago', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cheques = ControlDeCheque::all()->pluck('numero_de_cheque', 'id')->prepend(trans('global.pleaseSelect'), '');

        $movimientosBancario->load('referencia', 'cheque', 'team');

        return view('admin.movimientosBancarios.edit', compact('referencias', 'cheques', 'movimientosBancario'));
    }

    public function update(UpdateMovimientosBancarioRequest $request, MovimientosBancario $movimientosBancario)
    {
        abort_unless(\Gate::allows('movimientos_bancario_edit'), 403);

        $movimientosBancario->update($request->all());

        return redirect()->route('admin.movimientos-bancarios.index');
    }

    public function show(MovimientosBancario $movimientosBancario)
    {
        abort_unless(\Gate::allows('movimientos_bancario_show'), 403);

        $movimientosBancario->load('referencia', 'cheque', 'team');

        return view('admin.movimientosBancarios.show', compact('movimientosBancario'));
    }

    public function destroy(MovimientosBancario $movimientosBancario)
    {
        abort_unless(\Gate::allows('movimientos_bancario_delete'), 403);

        $movimientosBancario->delete();

        return back();
    }

    public function massDestroy(MassDestroyMovimientosBancarioRequest $request)
    {
        MovimientosBancario::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
