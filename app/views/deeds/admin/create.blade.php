@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Crear <small>Escrituras Públicas</small>
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
                    {{ Form::open(['route' => 'admin.deeds.store']) }}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nro. de Escrituras Públicas</label>
                                {{ Form::text('number_deeds', Input::old('number_deeds'), ['class' => 'form-control', 'placeholder' => 'Nro. de Escrituras Públicas']) }}
                            </div>
                            @if( $errors->has('number_deeds') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('number_deeds') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Protocolo</label>
                                {{ Form::text('protocol', Input::old('protocol'), ['class' => 'form-control', 'placeholder' => 'Protocolo']) }}
                            </div>
                            @if( $errors->has('protocol') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('protocol') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Folio</label>
                                {{ Form::text('folio', Input::old('folio'), ['class' => 'form-control', 'placeholder' => 'Folio']) }}
                            </div>
                            @if( $errors->has('folio') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('folio') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Otorgado por</label>
                                {{ Form::text('given_by', Input::old('given_by'), ['class' => 'form-control', 'placeholder' => 'Otorgado por']) }}
                            </div>
                            @if( $errors->has('given_by') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('given_by') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>A Favor</label>
                                {{ Form::text('pro', Input::old('pro'), ['class' => 'form-control', 'placeholder' => 'A Favor']) }}
                            </div>
                            @if( $errors->has('pro') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('pro') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Tipo de Escritura</label>
                                {{ Form::text('type_writing', Input::old('type_writing'), ['class' => 'form-control', 'placeholder' => 'Tipo de Escritura']) }}
                            </div>
                            @if( $errors->has('type_writing') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('type_writing') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>A Notario</label>
                                <select id="notar_id" class="form-control">
                                    <option>A Notario</option>
                            @if(isset($notaries))
                                @foreach($notaries as $notary)
                                    <option value="{{ $notary->id }}">{{ $notary->name }}</option>
                                @endforeach
                            @endif
                                </select>
                            </div>
                            @if( $errors->has('notary_id') )
                                <div class="alert alert-danger">
                                @foreach($errors->get('notary_id') as $error)
                                    * {{$error}}</br>
                                @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Fecha (AAAA-MM-DD)</label>
                                {{ Form::text('date', Input::old('date'), ['class' => 'form-control', 'placeholder' => 'Fecha (AAAA-MM-DD)']) }}
                            </div>
                            @if( $errors->has('date') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('date') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Nro. de Fojas</label>
                                {{ Form::text('number_folios', Input::old('number_folios'), ['class' => 'form-control', 'placeholder' => 'Nro. de Fojas']) }}
                            </div>
                            @if( $errors->has('number_folios') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('number_folios') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Descripción</label>
                                {{ Form::textArea('description', Input::old('description'), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Descripción']) }}
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Aceptar</button>
                            <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Resetear</button>
                        </div>
                    {{ Form::close() }}
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop