@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editar <small>Registro Civil</small>
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
                    {{ Form::open(['route' => ['admin.records.update', $record->id], 'method' => 'PUT']) }}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Número de Partida</label>
                                {{ Form::text('number_starting', $record->number_starting, ['class' => 'form-control', 'placeholder' => 'Número de Partida']) }}
                            </div>
                            @if( $errors->has('number_starting') )
                                <div class="alert alert-danger">
                                @foreach($errors->get('number_starting') as $error)
                                    * {{$error}}</br>
                                @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Folio</label>
                                {{ Form::text('folio', $record->folio, ['class' => 'form-control', 'placeholder' => 'Folio']) }}
                            </div>
                            @if( $errors->has('folio') )
                                <div class="alert alert-danger">
                                @foreach($errors->get('folio') as $error)
                                    * {{$error}}</br>
                                @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Legajo</label>
                                {{ Form::text('file', $record->file, ['class' => 'form-control', 'placeholder' => 'Legajo']) }}
                            </div>
                            @if( $errors->has('file') )
                                <div class="alert alert-danger">
                                @foreach($errors->get('file') as $error)
                                    * {{$error}}</br>
                                @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Fecha (AAAA-MM-DD)</label>
                                {{ Form::text('date', $record->date, ['class' => 'form-control', 'placeholder' => 'Fecha (AAAA-MM-DD)']) }}
                            </div>
                            @if( $errors->has('date') )
                                <div class="alert alert-danger">
                                @foreach($errors->get('date') as $error)
                                    * {{$error}}</br>
                                @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Interesado</label>
                                {{ Form::text('interested_m', $record->interested_m, ['class' => 'form-control', 'placeholder' => 'Interesado']) }}
                            </div>
                            @if( $errors->has('interested_m') )
                                <div class="alert alert-danger">
                                @foreach($errors->get('interested_m') as $error)
                                    * {{$error}}</br>
                                @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Interesada</label>
                                {{ Form::text('interested_f', $record->interested_f, ['class' => 'form-control', 'placeholder' => 'Interesada']) }}
                            </div>
                            @if( $errors->has('interested_f') )
                                <div class="alert alert-danger">
                                @foreach($errors->get('interested_f') as $error)
                                    * {{$error}}</br>
                                @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Municipalidad</label>
                                <select class="form-control" name="municipality_id">
                                    <option value="{{ $record->municipalities->id }}">{{ $record->municipalities->name }}</option>
                                    <option>-------------------------------------------------------------</option>
                            @if(isset($municipalities))
                                @foreach($municipalities as $municipality)
                                    <option value="{{ $municipality->id }}">{{ $municipality->name }}</option>
                                @endforeach
                            @endif
                                </select>
                            </div>
                            @if( $errors->has('municipality_id') )
                                <div class="alert alert-danger">
                                @foreach($errors->get('municipality_id') as $error)
                                    * {{$error}}</br>
                                @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Partida</label>
                                {{ Form::text('starting', $record->starting, ['class' => 'form-control', 'placeholder' => 'Partida']) }}
                            </div>
                            @if( $errors->has('starting') )
                                <div class="alert alert-danger">
                                @foreach($errors->get('starting') as $error)
                                    * {{$error}}</br>
                                @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Descripción</label>
                                {{ Form::textArea('description', $record->description, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Descripción']) }}
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