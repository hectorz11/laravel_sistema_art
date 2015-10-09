@extends('layouts.backend.base')

@section('content')

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista <small>Usuarios</small>
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
                            <div class="col-lg-12">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Grupos del Archivo Regional de Tacna</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nombre(s)</th>
                                                    <th>Apellidos</th>
                                                    <th>Correo ectrónico</th>
                                                    <th>Activación</th>
                                                    <th>Fecha de Creación</th>
                                                    <th>Operaciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->first_name }}</td>
                                                    <td>{{ $user->last_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                @if ($user->activated == true)
                                                    <td><button class="btn btn-xs btn-success">Activado</button></td>
                                                @else 
                                                    <td><button class="btn btn-xs btn-danger">Desactivado</button></td>
                                                @endif
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>
                                                        <a href="{{ URL::route('admin.users.edit', $user->id) }}" class="btn btn-sm">
                                                            <i class='glyphicon glyphicon-edit'></i> Editar
                                                        </a>
                                                        <a href="#" class="btn btn-sm">
                                                            <i class='glyphicon glyphicon-remove-circle'></i> Roles
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