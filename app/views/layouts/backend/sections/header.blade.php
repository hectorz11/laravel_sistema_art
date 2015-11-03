            <!-- Sentry and Model User -->
            <?php
                $sentry = Sentry::getUser();
                $user = User::find($sentry->id);
                $date = '2015-10-16';

                $profiles = DB::('profiles')->whereHas('comments' ,function($query)
                {
                    $query->where('created_at', 'like', '2015-10-16%');
                })->take(3)->get();
            ?>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                    @foreach ($profiles as $p)
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="{{ $p->photo }}" alt="..." width="50" height="50">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>{{ $p->users->first_name }}</strong></h5>
                                        <h5 class="media-heading"><strong>{{ $p->users->last_name }}</strong></h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Nro. de comentarios = {{ count($p->comments) }}</p>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $user->first_name }} {{ $user->last_name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    @if ($sentry->hasAnyAccess(['admin']))
                        <li>
                            <a href="{{ URL::route('admin.profiles.edit', $sentry->id) }}"><i class="fa fa-fw fa-user"></i> Perfil Administrador</a>
                        </li>
                    @endif
                    @if ($sentry->hasAnyAccess(['users']))
                        <li>
                            <a href="{{ URL::route('users.profiles.edit', $sentry->id) }}"><i class="fa fa-fw fa-user"></i> Perfil Usuario</a>
                        </li>
                    @endif
                    @if ($sentry->hasAnyAccess(['comments_index']))
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
