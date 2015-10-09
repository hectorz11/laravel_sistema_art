            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Panel de Administración</a>
                    </li>
                    @if (Sentry::getUser()->hasAccess(['admin']))
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#deeds">
                            <i class="fa fa-fw fa-desktop"></i> Escrituras Públicas 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="deeds" class="collapse">
                        @if (Sentry::getUser()->hasAccess(['deeds_index']))
                            <li><a href="{{ URL::route('admin.deeds.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.deeds.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#agrarians">
                            <i class="fa fa-fw fa-desktop"></i> Expedientes Agrarios 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="agrarians" class="collapse">
                        @if (Sentry::getUser()->hasAccess(['agrarians_index']))
                            <li><a href="{{ URL::route('admin.agrarians.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.agrarians.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#civils">
                            <i class="fa fa-fw fa-desktop"></i> Expedientes Civiles 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="civils" class="collapse">
                        @if (Sentry::getUser()->hasAccess(['civils_index']))
                            <li><a href="{{ URL::route('admin.civils.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.civils.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#penals">
                            <i class="fa fa-fw fa-desktop"></i> Expedientes Penales 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="penals" class="collapse">
                        @if (Sentry::getUser()->hasAccess(['penals_index']))
                            <li><a href="{{ URL::route('admin.penals.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.penals.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#records">
                            <i class="fa fa-fw fa-desktop"></i> Registros Civiles 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="records" class="collapse">
                        @if (Sentry::getUser()->hasAccess(['records_index']))
                            <li><a href="{{ URL::route('admin.records.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.records.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#municipalities">
                            <i class="fa fa-fw fa-file"></i> Municipalidades
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="municipalities" class="collapse">
                        @if (Sentry::getUser()->hasAccess(['municipalities_index']))
                            <li><a href="{{ URL::route('admin.municipalities.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.municipalities.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#notaries">
                            <i class="fa fa-fw fa-file"></i> Notarios 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="notaries" class="collapse">
                        @if (Sentry::getUser()->hasAccess(['notaries_index']))
                            <li><a href="{{ URL::route('admin.notaries.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.notaries.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#groups">
                            <i class="fa fa-fw fa-wrench"></i> Administrar Grupos
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="groups" class="collapse">
                        @if (Sentry::getUser()->hasAccess(['groups_index']))
                            <li><a href="{{ URL::route('admin.groups.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.groups.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        @else
                            <li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#users">
                            <i class="fa fa-fw fa-wrench"></i> Administrar Usuarios
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="users" class="collapse">
                        @if (Sentry::getUser()->hasAccess(['users_index']))
                            <li><a href="{{ URL::route('admin.users.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                        @else
                            <li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene acceso</a></li>
                        @endif
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->