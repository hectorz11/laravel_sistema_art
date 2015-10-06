@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editar <small>Grupo</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
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
                    {{ Form::open(['route' => ['admin.groups.update', $user->id], 'method' => 'PUT']) }}
                        <div class="col-lg-12">
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
                            @if( $errors->has('last_name') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('last_name') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Correo Electrónico</label>
                                {{ Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Correo Electrónico']) }}
                            </div>
                            @if( $errors->has('email') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('email') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Aceptar</button>
                            <a href="{{ URL::route('admin.groups.index') }}" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
                        </div>
                    {{ Form::close() }}
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop