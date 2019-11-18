<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\Team;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with(['team', 'roles'])->select(sprintf('%s.*', (new User)->table));
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

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
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
            $table->editColumn('religion', function ($row) {
                return $row->religion ? $row->religion : "";
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
            $table->editColumn('cargo', function ($row) {
                return $row->cargo ? $row->cargo : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'roles']);

            return $table->make(true);
        }

        return view('admin.users.index');
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.users.create', compact('teams', 'roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('team', 'roles');

        return view('admin.users.edit', compact('teams', 'roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('team', 'roles');

        return view('admin.users.show', compact('user'));
    }
}
