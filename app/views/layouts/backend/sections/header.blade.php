            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                    @foreach (Sentry::all() as $p)
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="{{ $p->profiles->photo }}" alt="..." width="50" height="50">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>{{ $p->first_name }}</strong></h5>
                                        <h5 class="media-heading"><strong>{{ $p->last_name }}</strong></h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Nro. de comentarios = </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Sentry::getUser()->first_name }} {{ Sentry::getUser()->last_name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    @if (Sentry::hasAccess(['admin']))
                        <li>
                            <a href="{{ URL::route('admin.profiles.edit', Sentry::getUser()->id) }}"><i class="fa fa-fw fa-user"></i> Perfil Administrador</a>
                        </li>
                    @endif
                    @if (Sentry::hasAccess(['users']))
                        <li>
                            <a href="{{ URL::route('users.profiles.edit', Sentry::getUser()->id) }}"><i class="fa fa-fw fa-user"></i> Perfil Usuario</a>
                        </li>
                    @endif
                    @if (Sentry::hasAccess(['comments_index']))
                        <li>
                            <a href="{{ URL::route('users.comments.index') }}"><i class="fa fa-fw fa-envelope"></i> Comentarios</a>
                        </li>
                    @endif
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Configuraciones</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ URL::route('signout') }}"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
