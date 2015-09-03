@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editar <small>Escrituras Públicas</small>
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
                                <label>Nro. de Escrituras Públicas</label>
                                <input class="form-control" placeholder="Nro. de Escrituras Públicas">
                            </div>
                            <div class="form-group">
                                <label>Protocolo</label>
                                <input class="form-control" placeholder="Protocolo">
                            </div>
                            <div class="form-group">
                                <label>Folio</label>
                                <input class="form-control" placeholder="Folio">
                            </div>
                            <div class="form-group">
                                <label>Otorgado por</label>
                                <input class="form-control" placeholder="Otorgado por">
                            </div>
                            <div class="form-group">
                                <label>A Favor</label>
                                <input class="form-control" placeholder="A Favor">
                            </div>
                            <div class="form-group">
                                <label>Tipo de Escritura</label>
                                <input class="form-control" placeholder="Tipo de Escritura">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>A Notario</label>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha (AAAA-MM-DD)</label>
                                <input class="form-control" placeholder="Fecha (AAAA-MM-DD)">
                            </div>
                            <div class="form-group">
                                <label>Nro. de Fojas</label>
                                <input class="form-control" placeholder="Nro. de Fojas">
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

@section('scripts')

@stop