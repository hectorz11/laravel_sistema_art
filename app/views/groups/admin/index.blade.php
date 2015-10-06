@extends('layouts.backend.base')

@section('content')

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista <small>Grupos</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
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
                            <div class="col-lg-12">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Grupos del Archivo Regional de Tacna</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Grupo</th>
                                                    <th>Fecha de Creacion</th>
                                                    <th>Fecha de Actualizacion</th>
                                                    <th>Operaciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($groups as $group)
                                                <tr>
                                                    <td>{{ $group->name }}</td>
                                                    <td>{{ $group->created_at }}</td>
                                                    <td>{{ $group->updated_at }}</td>
                                                    <td>
                                                        <a href="{{ URL::route('admin.groups.edit', $group->id) }}" class="btn btn-info btn-sm">
                                                            <i class='glyphicon glyphicon-edit'></i> Editar
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-sm">
                                                            <i class='glyphicon glyphicon-remove-circle'></i> Eliminar
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
                            <a href="{{ URL::route('admin.groups.create') }}" class="btn btn-lg btn-primary" name="ingresar">
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
@stop