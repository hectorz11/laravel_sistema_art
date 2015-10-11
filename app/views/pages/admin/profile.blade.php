@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editar <small>Perfil</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Panel</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Editar
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
                    {{ Form::open(['route' => ['admin.civils.update', $user->id], 'method' => 'PUT']) }}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nombre(s)</label>
                                {{ Form::text('first_name', $user->first_name, ['class' => 'form-control', 'placeholder' => 'Nombre(s)']) }}
                            </div>
                            @if( $errors->has('first_name') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('first_name') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Apellidos</label>
                                {{ Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => 'Apellidos']) }}
                            </div>
                            <div class="form-group">
                                <label>Correo Electrónico</label>
                                {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Correo Electrónico']) }}
                            </div>
                            @if( $errors->has('email') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('email') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Fecha de Nacimiento</label>
                                {{ Form::text('birthday', $user->profiles->birthday, ['class' => 'form-control', 'placeholder' => 'Fecha de Nacimiento']) }}
                            </div>
                            <div class="form-group">
                                <label>Celular/Teléfono</label>
                                {{ Form::text('phone', $user->profiles->phone, ['class' => 'form-control', 'placeholder' => 'Celular/Teléfono']) }}
                            </div>
                            <div class="form-group">
                                <label>Sexo</label>
                                {{ Form::text('gender', $user->profiles->gender, ['class' => 'form-control', 'placeholder' => 'Sexo']) }}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Aceptar</button>
                            <a href="{{ URL::route('admin.users.index') }}" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
                        </div>
                    {{ Form::close() }}
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop