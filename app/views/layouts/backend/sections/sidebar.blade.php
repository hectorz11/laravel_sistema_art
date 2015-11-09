            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    @if (Sentry::hasAccess(['admin']))
                    <li class="active">
                        <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Panel de Administración</a>
                    </li>
                    @elseif (Sentry::hasAccess(['users']))
                    <li class="active">
                        <a href="{{ URL::route('users.dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Panel de Usuario</a>
                    </li>
                    @endif
                    @if (Sentry::hasAccess(['admin']))
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#deeds">
                            <i class="fa fa-fw fa fa-book"></i> Escrituras Públicas 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="deeds" class="collapse">
                        @if (Sentry::hasAccess(['deeds_index']))
                            <li><a href="{{ URL::route('admin.deeds.index') }}"><i class="fa fa-check-circle"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.deeds.create') }}"><i class="fa fa-plus-circle"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-times-circle"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#agrarians">
                            <i class="fa fa-fw fa fa-book"></i> Expedientes Agrarios 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="agrarians" class="collapse">
                        @if (Sentry::hasAccess(['agrarians_index']))
                            <li><a href="{{ URL::route('admin.agrarians.index') }}"><i class="fa fa-check-circle"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.agrarians.create') }}"><i class="fa fa-plus-circle"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-times-circle"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#civils">
                            <i class="fa fa-fw fa fa-book"></i> Expedientes Civiles 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="civils" class="collapse">
                        @if (Sentry::hasAccess(['civils_index']))
                            <li><a href="{{ URL::route('admin.civils.index') }}"><i class="fa fa-check-circle"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.civils.create') }}"><i class="fa fa-plus-circle"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-times-circle"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#penals">
                            <i class="fa fa-fw fa fa-book"></i> Expedientes Penales 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="penals" class="collapse">
                        @if (Sentry::hasAccess(['penals_index']))
                            <li><a href="{{ URL::route('admin.penals.index') }}"><i class="fa fa-check-circle"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.penals.create') }}"><i class="fa fa-plus-circle"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-times-circle"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#records">
                            <i class="fa fa-fw fa fa-book"></i> Registros Civiles 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="records" class="collapse">
                        @if (Sentry::hasAccess(['records_index']))
                            <li><a href="{{ URL::route('admin.records.index') }}"><i class="fa fa-check-circle"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.records.create') }}"><i class="fa fa-plus-circle"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-times-circle"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#municipalities">
                            <i class="fa fa-fw fa-list-alt"></i> Municipalidades
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="municipalities" class="collapse">
                        @if (Sentry::hasAccess(['municipalities_index']))
                            <li><a href="{{ URL::route('admin.municipalities.index') }}"><i class="fa fa-check-circle"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.municipalities.create') }}"><i class="fa fa-plus-circle"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-times-circle"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#notaries">
                            <i class="fa fa-fw fa-list-alt"></i> Notarios 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="notaries" class="collapse">
                        @if (Sentry::hasAccess(['notaries_index']))
                            <li><a href="{{ URL::route('admin.notaries.index') }}"><i class="fa fa-check-circle"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.notaries.create') }}"><i class="fa fa-plus-circle"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-times-circle"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#groups">
                            <i class="fa fa-fw fa-users"></i> Administrar Grupos
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="groups" class="collapse">
                        @if (Sentry::hasAccess(['groups_index']))
                            <li><a href="{{ URL::route('admin.groups.index') }}"><i class="fa fa-check-circle"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.groups.create') }}"><i class="fa fa-plus-circle"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-times-circle"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#users">
                            <i class="fa fa-fw fa-user"></i> Administrar Usuarios
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="users" class="collapse">
                        @if (Sentry::hasAccess(['users_index']))
                            <li><a href="{{ URL::route('admin.users.index') }}"><i class="fa fa-check-circle"></i> Lista</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-times-circle"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->