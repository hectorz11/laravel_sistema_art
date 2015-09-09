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
                    {{ Form::open(['route' => 'admin.penals.store']) }}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nro. de Expediente Penal</label>
                                {{ Form::text('number_penal', Input::old('number_penal'), ['class' => 'form-control', 'placeholder' => 'Nro de Expediente Penal']) }}
                            </div>
                            @if( $errors->has('number_penal') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('number_penal') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Fecha (AAAA-MM-DD)</label>
                                {{ Form::text('start_date', Input::old('start_date'), ['class' => 'form-control', 'placeholder' => 'Fecha (AAAA-MM-DD)']) }}
                            </div>
                            @if( $errors->has('start_date') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('start_date') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Inculpado</label>
                                {{ Form::text('acussed', Input::old('acussed'), ['class' => 'form-control', 'placeholder' => 'Inculpado']) }}
                            </div>
                            @if( $errors->has('acussed') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('acussed') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Delito</label>
                                {{ Form::text('crime', Input::old('crime'), ['class' => 'form-control', 'placeholder' => 'Delito']) }}
                            </div>
                            @if( $errors->has('crime') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('crime') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Agraviado</label>
                                {{ Form::text('aggrieved', Input::old('aggrieved'), ['class' => 'form-control', 'placeholder' => 'Agraviado']) }}
                            </div>
                            @if( $errors->has('aggrieved') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('aggrieved') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Juez Instructor</label>
                                {{ Form::text('judge', Input::old('judge'), ['class' => 'form-control', 'placeholder' => 'Juez Instructor']) }}
                            </div>
                            @if( $errors->has('judge') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('judge') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Escribano</label>
                                {{ Form::text('scribe', Input::old('scribe'), ['class' => 'form-control', 'placeholder' => 'Escribano']) }}
                            </div>
                            @if( $errors->has('scribe') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('scribe') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Referencias</label>
                                {{ Form::textArea('references', Input::old('references'), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Referencias']) }}
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                {{ Form::textArea('description', Input::old('description'), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Descripción']) }}
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Aceptar</button>
                            <a href="{{ URL::route('admin.penals.index') }}" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
                        </div>
                    {{ Form::close() }}
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop