@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editar <small>Municipalidad</small>
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
                    {{ Form::open(['route' => ['admin.municipalities.update', $municipality->id], 'method' => 'PUT']) }}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                {{ Form::text('name', $municipality->name, ['class' => 'form-control', 'placeholder' => 'Nombre de la Municipalidad']) }}
                            </div>
                            @if( $errors->has('name') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('name') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Status</label>
                                {{ Form::checkBox('status', 1, $municipality->valor($municipality->id), ['class' => 'form-control']) }}
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Aceptar</button>
                            <a href="{{ URL::route('admin.municipalities.index') }}" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
                        </div>
                    {{ Form::close() }}
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop