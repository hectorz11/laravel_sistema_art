@extends('layouts.backend.base')

@section('content')

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista <small>Registros Civiles</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::route('users.dashboard') }}"><i class="fa fa-dashboard"></i> Panel</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Lista
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                @if(Session::has('message'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-{{ Session::get('class') }} alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                @endif

                <div class="row">
                    <div class="col-lg-12">
                    <link href="http://hectorz11.github.io/laravel_sistema_art/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
                        <table class="table table-striped table-bordered" id="tableRecordsUser">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Municipalidad</th>
                                    <th>Nro. de Partida</th>
                                    <th>Fecha</th>
                                    <th>Interesado</th>
                                    <th>Interesada</th>
                                    <th>Partida</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-actions" align="center">
                            <a href="{{ URL::route('users.dashboard') }}" class="btn btn-lg btn-danger">
                                <i class="fa fa-home"></i> Regresar al Menu Principal
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

<script src="http://hectorz11.github.io/laravel_sistema_art/assets/js/jquery-1.11.0.min.js"></script>
<script src="http://hectorz11.github.io/laravel_sistema_art/assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="http://hectorz11.github.io/laravel_sistema_art/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="{{ URL::asset('/scripts/records.js') }}"></script>
@stop
