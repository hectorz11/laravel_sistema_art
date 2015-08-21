@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Crear <small>Expedientes Civiles</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Crear
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
                    <form role="form">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nro. de Expediente Civil</label>
                                <input class="form-control" placeholder="Nro. de Expediente Civil">
                            </div>
                            <div class="form-group">
                                <label>Fecha (AAAA-MM-DD)</label>
                                <input class="form-control" placeholder="Fecha (AAAA-MM-DD)">
                            </div>
                            <div class="form-group">
                                <label>Demandante</label>
                                <input class="form-control" placeholder="Demandante">
                            </div>
                            <div class="form-group">
                                <label>Demandado</label>
                                <input class="form-control" placeholder="Demandado">
                            </div>
                            <div class="form-group">
                                <label>Materia</label>
                                <input class="form-control" placeholder="Materia">
                            </div>
                            <div class="form-group">
                                <label>Secretario</label>
                                <input class="form-control" placeholder="Secretario">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Legajo</label>
                                <input class="form-control" placeholder="Legajo">
                            </div>
                            <div class="form-group">
                                <label>Referencias</label>
                                <textarea class="form-control" rows="3" placeholder="Referencias"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea class="form-control" rows="3" placeholder="Descripción"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                            <button type="reset" class="btn btn-danger">Resetear</button>
                        </div>
                    </form>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop