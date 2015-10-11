@extends('layouts.backend.base')

@section('content')

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista <small>Escrituras Públicas</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::route('users.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
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
                    <link href="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
                        <table class="table table-striped table-bordered table-hover" id="tableDeedsUser">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Notario</th>
                                    <th>Nro. de E. Pública</th>
                                    <th>Protocolo</th>
                                    <th>Folio</th>
                                    <th>Otorgado por</th>
                                    <th>A favor</th>
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
                            <a href="{{ URL::route('user.dashboard') }}" class="btn btn-lg btn-danger">
                                <i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class='row'>
                    <!--al pulsar en el botón debajo de éste mostraremos los usuarios registrados-->
                    <div class='col-lg-12'>
                        {{ HTML::link(URL::to('#'), 'Ver usuarios registrados', ['class' => 'show_users']) }}  
                        <!--div para mostrar un preloader mientras cargamos los usuarios-->
                        <div style='margin: 10px 0px 0px 300px' class='preload_users'></div>
                        <!--aquí se mostrarán los Expedientes Públicos-->
                        <table class='load_ajax table table-striped table-bordered table-hover'>
                        </table>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->
@stop

@section('scripts')
<script src="{{ URL::asset('/assets/js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
<script src="{{ URL::asset('/scripts/deeds.js') }}"></script>
@stop