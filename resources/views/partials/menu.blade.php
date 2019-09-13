<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('team_access')
                            <li class="{{ request()->is('admin/teams') || request()->is('admin/teams/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.teams.index") }}">
                                    <i class="fa-fw fas fa-users">

                                    </i>
                                    <span>{{ trans('cruds.team.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('provincium_access')
                            <li class="{{ request()->is('admin/provincia') || request()->is('admin/provincia/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.provincia.index") }}">
                                    <i class="fa-fw fas fa-sitemap">

                                    </i>
                                    <span>{{ trans('cruds.provincium.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('grupo_access')
                            <li class="{{ request()->is('admin/grupos') || request()->is('admin/grupos/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.grupos.index") }}">
                                    <i class="fa-fw fas fa-list-alt">

                                    </i>
                                    <span>{{ trans('cruds.grupo.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('evento_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw far fa-calendar-alt">

                        </i>
                        <span>{{ trans('cruds.evento.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('lista_de_evento_access')
                            <li class="{{ request()->is('admin/lista-de-eventos') || request()->is('admin/lista-de-eventos/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.lista-de-eventos.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.listaDeEvento.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('avisos_de_salida_access')
                            <li class="{{ request()->is('admin/avisos-de-salidas') || request()->is('admin/avisos-de-salidas/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.avisos-de-salidas.index") }}">
                                    <i class="fa-fw fas fa-map-marked-alt">

                                    </i>
                                    <span>{{ trans('cruds.avisosDeSalida.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('registro_evento_access')
                            <li class="{{ request()->is('admin/registro-eventos') || request()->is('admin/registro-eventos/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.registro-eventos.index") }}">
                                    <i class="fa-fw fas fa-check">

                                    </i>
                                    <span>{{ trans('cruds.registroEvento.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('finanzas_de_provincium_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-dollar-sign">

                        </i>
                        <span>{{ trans('cruds.finanzasDeProvincium.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('control_de_cheque_access')
                            <li class="{{ request()->is('admin/control-de-cheques') || request()->is('admin/control-de-cheques/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.control-de-cheques.index") }}">
                                    <i class="fa-fw fas fa-money-bill">

                                    </i>
                                    <span>{{ trans('cruds.controlDeCheque.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('control_de_gasto_access')
                            <li class="{{ request()->is('admin/control-de-gastos') || request()->is('admin/control-de-gastos/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.control-de-gastos.index") }}">
                                    <i class="fa-fw fas fa-file-export">

                                    </i>
                                    <span>{{ trans('cruds.controlDeGasto.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('movimientos_bancario_access')
                            <li class="{{ request()->is('admin/movimientos-bancarios') || request()->is('admin/movimientos-bancarios/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.movimientos-bancarios.index") }}">
                                    <i class="fa-fw fas fa-money-check-alt">

                                    </i>
                                    <span>{{ trans('cruds.movimientosBancario.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="{{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                <a href="{{ route("admin.systemCalendar") }}">
                    <i class="fas fa-fw fa-calendar">

                    </i>
                    <span>{{ trans('global.systemCalendar') }}</span>
                </a>
            </li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>