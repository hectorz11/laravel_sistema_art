            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#deeds">
                            <i class="fa fa-fw fa-desktop"></i> Escrituras Públicas 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="deeds" class="collapse">
                            <li><a href="{{ URL::route('admin.deeds.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.deeds.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#agrarians">
                            <i class="fa fa-fw fa-desktop"></i> Expedientes Agrarios 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="agrarians" class="collapse">
                            <li><a href="{{ URL::route('admin.agrarians.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.agrarians.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#civils">
                            <i class="fa fa-fw fa-desktop"></i> Expedientes Civiles 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="civils" class="collapse">
                            <li><a href="{{ URL::route('admin.civils.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.civils.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#penals">
                            <i class="fa fa-fw fa-desktop"></i> Expedientes Penales 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="penals" class="collapse">
                            <li><a href="{{ URL::route('admin.penals.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.penals.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#records">
                            <i class="fa fa-fw fa-desktop"></i> Registros Civiles 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="records" class="collapse">
                            <li><a href="{{ URL::route('admin.records.index') }}"><i class="glyphicon glyphicon-new-window"></i> Lista</a></li>
                            <li><a href="{{ URL::route('admin.records.create') }}"><i class="glyphicon glyphicon-log-in"></i> Crear</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="zapana/bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="zapana/javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="zapana/blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="zapana/index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->