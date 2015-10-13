@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editar <small>Expediente Civil</small>
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
                    {{ Form::open(['route' => ['admin.civils.update', $civil->id], 'method' => 'PUT']) }}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nro. de Expediente Civil</label>
                                {{ Form::text('number_civil', $civil->number_civil, ['class' => 'form-control', 'placeholder' => 'Nro de Expediente Civil']) }}
                            </div>
                            @if( $errors->has('number_civil') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('number_civil') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Fecha (AAAA-MM-DD)</label>
                                {{ Form::text('date', $civil->date, ['class' => 'form-control', 'placeholder' => 'Fecha (AAAA-MM-DD)']) }}
                            </div>
                            @if( $errors->has('date') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('date') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Demandante</label>
                                {{ Form::text('demandant', $civil->demandant, ['class' => 'form-control', 'placeholder' => 'Demandante']) }}
                            </div>
                            @if( $errors->has('demandant') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('demandant') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Demandado</label>
                                {{ Form::text('defendant', $civil->defendant, ['class' => 'form-control', 'placeholder' => 'Demandado']) }}
                            </div>
                            @if( $errors->has('defendant') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('defendant') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Materia</label>
                                {{ Form::text('matery', $civil->matery, ['class' => 'form-control', 'placeholder' => 'Materia']) }}
                            </div>
                            @if( $errors->has('matery') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('matery') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Secretario</label>
                                {{ Form::text('secretary', $civil->secretary, ['class' => 'form-control', 'placeholder' => 'Secretario']) }}
                            </div>
                            @if( $errors->has('secretary') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('secretary') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Legajo</label>
                                {{ Form::text('file', $civil->file, ['class' => 'form-control', 'placeholder' => 'Legajo']) }}
                            </div>
                            @if( $errors->has('file') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('file') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Referencias</label>
                                {{ Form::textArea('references', $civil->references, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Referencias']) }}
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                {{ Form::textArea('description', $civil->description, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Descripción']) }}
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-check-circle-o"></i> Aceptar</button>
                            <a href="{{ URL::route('admin.civils.index') }}" class="btn btn-lg btn-danger"><i class="fa fa-times-circle-o"></i> Cancelar</a>
                        </div>
                    {{ Form::close() }}
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop