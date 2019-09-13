<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::query()->select('*');
            $query->with(['roles']);
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'user_show';
                $editGate      = 'user_edit';
                $deleteGate    = 'user_delete';
                $crudRoutePart = 'users';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
            $table->editColumn('roles', function ($row) {
                $labels = [];

                foreach ($row->roles as $role) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $role->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('cum', function ($row) {
                return $row->cum ? $row->cum : "";
            });
            $table->editColumn('curp', function ($row) {
                return $row->curp ? $row->curp : "";
            });
            $table->editColumn('nombre', function ($row) {
                return $row->nombre ? $row->nombre : "";
            });
            $table->editColumn('apellido_paterno', function ($row) {
                return $row->apellido_paterno ? $row->apellido_paterno : "";
            });
            $table->editColumn('apellido_materno', function ($row) {
                return $row->apellido_materno ? $row->apellido_materno : "";
            });
            $table->editColumn('sexo', function ($row) {
                return $row->sexo ? $row->sexo : "";
            });

            $table->editColumn('ocupacion', function ($row) {
                return $row->ocupacion ? $row->ocupacion : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('telefono_particular', function ($row) {
                return $row->telefono_particular ? $row->telefono_particular : "";
            });
            $table->editColumn('telefono_oficina', function ($row) {
                return $row->telefono_oficina ? $row->telefono_oficina : "";
            });
            $table->editColumn('domicilio', function ($row) {
                return $row->domicilio ? $row->domicilio : "";
            });
            $table->editColumn('colonia', function ($row) {
                return $row->colonia ? $row->colonia : "";
            });
            $table->editColumn('municipio', function ($row) {
                return $row->municipio ? $row->municipio : "";
            });
            $table->editColumn('estado', function ($row) {
                return $row->estado ? $row->estado : "";
            });
            $table->editColumn('provincia', function ($row) {
                return $row->provincia ? $row->provincia : "";
            });
            $table->editColumn('distrito', function ($row) {
                return $row->distrito ? $row->distrito : "";
            });
            $table->editColumn('grupo', function ($row) {
                return $row->grupo ? $row->grupo : "";
            });
            $table->editColumn('localidad', function ($row) {
                return $row->localidad ? $row->localidad : "";
            });
            $table->editColumn('seccion', function ($row) {
                return $row->seccion ? $row->seccion : "";
            });
            $table->editColumn('religion', function ($row) {
                return $row->religion ? $row->religion : "";
            });
            $table->rawColumns(['actions', 'placeholder', 'roles']);

            return $table->make(true);
        }

        return view('admin.users.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('user_create'), 403);

        $roles = Role::all()->pluck('title', 'id');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.users.create', compact('roles', 'teams'));
    }

    public function store(StoreUserRequest $request)
    {
        abort_unless(\Gate::allows('user_create'), 403);

        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_unless(\Gate::allows('user_edit'), 403);

        $roles = Role::all()->pluck('title', 'id');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user->load('roles', 'team');

        return view('admin.users.edit', compact('roles', 'teams', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        abort_unless(\Gate::allows('user_edit'), 403);

        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_unless(\Gate::allows('user_show'), 403);

        $user->load('roles', 'team');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_unless(\Gate::allows('user_delete'), 403);

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
