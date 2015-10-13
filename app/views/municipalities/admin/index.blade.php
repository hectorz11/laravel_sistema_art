@extends('layouts.backend.base')

@section('content')

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista <small>Municipalidades</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Panel</a>
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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Municipalidades Activadas</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Status</th>
                                                    <th>Operaciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($muni_a as $ma)
                                                <tr>
                                                    <td>{{ $ma->name }}</td>
                                                @if($ma->status == 1)
                                                    <td><button class="btn btn-xs btn-success">Activado</button></td>
                                                @endif
                                                    <td>
                                                        <a href="{{ URL::route('admin.municipalities.edit', $ma->id) }}" class="btn btn-info btn-sm">
                                                            <i class='fa fa-edit'></i> Editar
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Municipalidades Desactivadas</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Status</th>
                                                    <th>Operaciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($muni_d as $md)
                                                <tr>
                                                    <td>{{ $md->name }}</td>
                                                @if($md->status == 0)
                                                    <td><button class="btn btn-xs btn-danger">Desactivado</button></td>
                                                @endif
                                                    <td>
                                                        <a href="{{ URL::route('admin.municipalities.edit', $md->id) }}" class="btn btn-info btn-sm">
                                                            <i class='fa fa-edit'></i> Editar
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions" align="center">
                            <a href="{{ URL::route('admin.municipalities.create') }}" class="btn btn-lg btn-primary" name="ingresar">
                                <i class="fa fa-plus-circle"></i> Ingresar Nuevo Registro
                            </a> 
                            <a href="{{ URL::route('admin.dashboard') }}" class="btn btn-lg btn-danger">
                                <i class="fa fa-home"></i> Regresar al Menu Principal
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop
