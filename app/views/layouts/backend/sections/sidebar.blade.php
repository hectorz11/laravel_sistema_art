            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="zapana/index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#deeds">
                            <i class="fa fa-fw fa-bar-chart-o"></i> Escrituras Públicas 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="deeds" class="collapse">
                            <li><a href="{{ URL::route('admin_deed_index') }}">Lista</a></li>
                            <li><a href="{{ URL::route('admin_deed_create') }}">Crear</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#agrarians">
                            <i class="fa fa-fw fa-table"></i> Expedientes Agrarios 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="agrarians" class="collapse">
                            <li><a href="{{ URL::route('admin_agrarian_index') }}">Lista</a></li>
                            <li><a href="{{ URL::route('admin_agrarian_create') }}">Crear</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#civils">
                            <i class="fa fa-fwfa fa-fw fa-edit"></i> Expedientes Civiles 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="civils" class="collapse">
                            <li><a href="{{ URL::route('admin_civil_index') }}">Lista</a></li>
                            <li><a href="{{ URL::route('admin_civil_create') }}">Crear</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#penals">
                            <i class="fa fa-fw fa-desktop"></i> Expedientes Penales 
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="penals" class="collapse">
                            <li><a href="{{ URL::route('admin_penal_index') }}">Lista</a></li>
                            <li><a href="{{ URL::route('admin_penal_create') }}">Crear</a></li>
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