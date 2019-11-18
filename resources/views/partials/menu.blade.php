<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('administrador_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/teams*') ? 'menu-open' : '' }} {{ request()->is('admin/provincia*') ? 'menu-open' : '' }} {{ request()->is('admin/grupos*') ? 'menu-open' : '' }} {{ request()->is('admin/regnals*') ? 'menu-open' : '' }} {{ request()->is('admin/audit-logs*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('cruds.administrador.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('team_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.teams.index") }}" class="nav-link {{ request()->is('admin/teams') || request()->is('admin/teams/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-users">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.team.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('provincium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.provincia.index") }}" class="nav-link {{ request()->is('admin/provincia') || request()->is('admin/provincia/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-sitemap">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.provincium.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('grupo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.grupos.index") }}" class="nav-link {{ request()->is('admin/grupos') || request()->is('admin/grupos/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-list-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.grupo.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('regnal_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.regnals.index") }}" class="nav-link {{ request()->is('admin/regnals') || request()->is('admin/regnals/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.regnal.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-file-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.auditLog.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/users*') ? 'menu-open' : '' }} {{ request()->is('admin/ficha-medicas*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ficha_medica_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.ficha-medicas.index") }}" class="nav-link {{ request()->is('admin/ficha-medicas') || request()->is('admin/ficha-medicas/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user-md">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.fichaMedica.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('evento_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/lista-de-eventos*') ? 'menu-open' : '' }} {{ request()->is('admin/registro-eventos*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw far fa-calendar-alt">

                            </i>
                            <p>
                                <span>{{ trans('cruds.evento.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('lista_de_evento_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.lista-de-eventos.index") }}" class="nav-link {{ request()->is('admin/lista-de-eventos') || request()->is('admin/lista-de-eventos/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-list">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.listaDeEvento.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('registro_evento_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.registro-eventos.index") }}" class="nav-link {{ request()->is('admin/registro-eventos') || request()->is('admin/registro-eventos/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-check">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.registroEvento.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('finanzas_de_provincium_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/presupuesto-anuals*') ? 'menu-open' : '' }} {{ request()->is('admin/control-de-cheques*') ? 'menu-open' : '' }} {{ request()->is('admin/movimientos-bancarios*') ? 'menu-open' : '' }} {{ request()->is('admin/control-de-gastos*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-dollar-sign">

                            </i>
                            <p>
                                <span>{{ trans('cruds.finanzasDeProvincium.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('presupuesto_anual_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.presupuesto-anuals.index") }}" class="nav-link {{ request()->is('admin/presupuesto-anuals') || request()->is('admin/presupuesto-anuals/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-money-check-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.presupuestoAnual.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('control_de_cheque_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.control-de-cheques.index") }}" class="nav-link {{ request()->is('admin/control-de-cheques') || request()->is('admin/control-de-cheques/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-money-bill">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.controlDeCheque.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('movimientos_bancario_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.movimientos-bancarios.index") }}" class="nav-link {{ request()->is('admin/movimientos-bancarios') || request()->is('admin/movimientos-bancarios/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-money-check-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.movimientosBancario.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('control_de_gasto_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.control-de-gastos.index") }}" class="nav-link {{ request()->is('admin/control-de-gastos') || request()->is('admin/control-de-gastos/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-file-export">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.controlDeGasto.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('actas_de_provincium_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/etiquetas-acuerdos-de-provincia*') ? 'menu-open' : '' }} {{ request()->is('admin/actas-ceps*') ? 'menu-open' : '' }} {{ request()->is('admin/acuerdos-ceps*') ? 'menu-open' : '' }} {{ request()->is('admin/actas-de-cops*') ? 'menu-open' : '' }} {{ request()->is('admin/acuerdos-cops*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-book">

                            </i>
                            <p>
                                <span>{{ trans('cruds.actasDeProvincium.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('etiquetas_acuerdos_de_provincium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.etiquetas-acuerdos-de-provincia.index") }}" class="nav-link {{ request()->is('admin/etiquetas-acuerdos-de-provincia') || request()->is('admin/etiquetas-acuerdos-de-provincia/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-tags">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.etiquetasAcuerdosDeProvincium.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('actas_cep_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.actas-ceps.index") }}" class="nav-link {{ request()->is('admin/actas-ceps') || request()->is('admin/actas-ceps/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-file-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.actasCep.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('acuerdos_cep_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.acuerdos-ceps.index") }}" class="nav-link {{ request()->is('admin/acuerdos-ceps') || request()->is('admin/acuerdos-ceps/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-align-justify">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.acuerdosCep.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('actas_de_cop_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.actas-de-cops.index") }}" class="nav-link {{ request()->is('admin/actas-de-cops') || request()->is('admin/actas-de-cops/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-file-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.actasDeCop.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('acuerdos_cop_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.acuerdos-cops.index") }}" class="nav-link {{ request()->is('admin/acuerdos-cops') || request()->is('admin/acuerdos-cops/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-align-justify">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.acuerdosCop.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('actas_de_grupo_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/actas-cogs*') ? 'menu-open' : '' }} {{ request()->is('admin/acuerdos-cogs*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-book">

                            </i>
                            <p>
                                <span>{{ trans('cruds.actasDeGrupo.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('actas_cog_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.actas-cogs.index") }}" class="nav-link {{ request()->is('admin/actas-cogs') || request()->is('admin/actas-cogs/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-file-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.actasCog.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('acuerdos_cog_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.acuerdos-cogs.index") }}" class="nav-link {{ request()->is('admin/acuerdos-cogs') || request()->is('admin/acuerdos-cogs/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-align-justify">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.acuerdosCog.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('solicitud_de_cambio_de_grupo_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.solicitud-de-cambio-de-grupos.index") }}" class="nav-link {{ request()->is('admin/solicitud-de-cambio-de-grupos') || request()->is('admin/solicitud-de-cambio-de-grupos/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user-shield">

                            </i>
                            <p>
                                <span>{{ trans('cruds.solicitudDeCambioDeGrupo.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('guia_de_acm_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.guia-de-acms.index") }}" class="nav-link {{ request()->is('admin/guia-de-acms') || request()->is('admin/guia-de-acms/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-file-signature">

                            </i>
                            <p>
                                <span>{{ trans('cruds.guiaDeAcm.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-calendar">

                        </i>
                        <p>
                            <span>{{ trans('global.systemCalendar') }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>