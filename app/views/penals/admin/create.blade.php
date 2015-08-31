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
                                <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Crear
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
                    <form role="form">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nro. de Expediente Penal</label>
                                <input class="form-control" placeholder="Nro. de Expediente Penal">
                            </div>
                            <div class="form-group">
                                <label>Fecha (AAAA-MM-DD)</label>
                                <input class="form-control" placeholder="Fecha (AAAA-MM-DD)">
                            </div>
                            <div class="form-group">
                                <label>Inculpado</label>
                                <input class="form-control" placeholder="Inculpado">
                            </div>
                            <div class="form-group">
                                <label>Delito</label>
                                <input class="form-control" placeholder="Delito">
                            </div>
                            <div class="form-group">
                                <label>Agraviado</label>
                                <input class="form-control" placeholder="Agraviado">
                            </div>
                            <div class="form-group">
                                <label>Juez Instructor</label>
                                <input class="form-control" placeholder="Juez Instructor">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Escribano</label>
                                <input class="form-control" placeholder="Escribano">
                            </div>
                            <div class="form-group">
                                <label>Referencias</label>
                                <textarea class="form-control" rows="3" placeholder="Referencias"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea class="form-control" rows="3" placeholder="Descripción"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Aceptar</button>
                            <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Resetear</button>
                        </div>
                    </form>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop