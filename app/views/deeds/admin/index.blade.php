@extends('layouts.backend.base')

@section('content')
<link href="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="container">
                            <table class="table table-striped table-bordered table-hover" id="tableDeeds">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Notario</th>
                                        <th>Nro. de Escritura Publica</th>
                                        <th>Protocolo</th>
                                        <th>Folio</th>
                                        <th>Otorgado por</th>
                                        <th>A favor</th>
                                        <th>Operaciones</th>
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
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-actions" align="center">
                                <a href="{{ URL::route('admin.dashboard') }}" class="btn btn-lg btn-primary" name="ingresar">
                                    <i class="glyphicon glyphicon-plus-sign"></i> Ingresar Nuevo Registro
                                </a> 
                                <a href="{{ URL::route('admin.dashboard') }}" class="btn btn-lg btn-danger">
                                    <i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal
                                </a>
                            </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
<script src="{{ URL::asset('/assets/js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
<script>
    $(document).ready(function() {
        event.preventDefault()
        $('#tableDeeds').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 6 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/admin/deeds/datatable',
        });
    });
</script>
@stop
