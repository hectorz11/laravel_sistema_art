@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Asignar <small>Rol</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Asignar
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
                    {{ Form::open(['route' => ['admin.users.role.post', $user->id]]) }}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nombre(s)</label>
                                {{ Form::text('first_name', $user->first_name, ['class' => 'form-control', 'placeholder' => 'Nombre(s)']) }}
                            </div>
                            <div class="form-group">
                                <label>Apellidos</label>
                                {{ Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => 'Apellidos']) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Grupos</label>
                                @foreach($groups as $group)
                                <ul>
                                    {{ Form::checkBox('groups[]', $group->id, User::roles($group->id, $user->id)) }} 
                                    {{ $group->name }}
                                </ul>
                                @endforeach
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