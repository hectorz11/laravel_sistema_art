@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Crear <small>Grupo</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Panel</a>
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
                    {{ Form::open(['route' => 'admin.groups.store']) }}
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nombre del Grupo</label>
                                {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'Nombre del Grupo']) }}
                            </div>
                            @if( $errors->has('name') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('name') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
 
                            <div class="row">
                                <div class="col-md-3 col-xs-4 col-sm-3">
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('groups_index', 1) }}</div>
                                        <div class="col-md-10">Grupo - Ver</div>  
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('groups_create', 1) }}</div>
                                        <div class="col-md-10">Grupo - Crear</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('groups_update', 1) }}</div>
                                        <div class="col-md-10">Grupo - Editar</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('groups_delete', 1) }}</div>
                                        <div class="col-md-10">Grupo - Eliminar</div> 
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('users_index', 1) }}</div>
                                        <div class="col-md-10">Usuario - Ver</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('users_create', 1) }}</div>
                                        <div class="col-md-10">Usuario - Crear</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('users_update', 1) }}</div>
                                        <div class="col-md-10">Usuario - Editar</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('users_delete', 1) }}</div>
                                        <div class="col-md-10">Usuario - Eliminar</div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('admin', 1) }}</div>
                                        <div class="col-md-10">Administrador</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-4 col-sm-3">
                                    
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('agrarians_index', 1) }}</div>
                                        <div class="col-md-10">Expediente Agrario - Ver</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('agrarians_create', 1) }}</div>
                                        <div class="col-md-10">Expediente Agrario - Crear</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('agrarians_update', 1) }}</div>
                                        <div class="col-md-10">Expediente Agrario - Editar</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('agrarians_delete', 1) }}</div>
                                        <div class="col-md-10">Expediente Agrario - Eliminar</div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('civils_index', 1) }}</div>
                                        <div class="col-md-10">Expediente Civil - Ver</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('civils_create', 1) }}</div>
                                        <div class="col-md-10">Expediente Civil - Crear</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('civils_update', 1) }}</div>
                                        <div class="col-md-10">Expediente Civil - Editar</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('civils_delete', 1) }}</div>
                                        <div class="col-md-10">Expediente Civil - Eliminar</div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('penals_index', 1) }}</div>
                                        <div class="col-md-10">Expediente Penal - Ver</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('penals_create', 1) }}</div>
                                        <div class="col-md-10">Expediente Penal - Crear</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('penals_update', 1) }}</div>
                                        <div class="col-md-10">Expediente Penal - Editar</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('penals_delete', 1) }}</div>
                                        <div class="col-md-10">Expediente Penal - Eliminar</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-4 col-sm-3">
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('deeds_index', 1) }}</div>
                                        <div class="col-md-10">Escritura Publico - Ver</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('deeds_create', 1) }}</div>
                                        <div class="col-md-10">Escritura Publico - Crear</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('deeds_update', 1) }}</div>
                                        <div class="col-md-10">Escritura Publico - Editar</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('deeds_delete', 1) }}</div>
                                        <div class="col-md-10">Escritura Publico - Eliminar</div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('records_index', 1) }}</div>
                                        <div class="col-md-10">Registro Civil - Ver</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('records_create', 1) }}</div>
                                        <div class="col-md-10">Registro Civil - Crear</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('records_update', 1) }}</div>
                                        <div class="col-md-10">Registro Civil - Editar</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('records_delete', 1) }}</div>
                                        <div class="col-md-10">Registro Civil - Eliminar</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-3 col-sm-3">
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('estado', 1) }}</div>
                                        <div class="col-md-10">Municipalidad - Ver</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('municipalities_create', 1) }}</div>
                                        <div class="col-md-10">Municiaplidad - Crear</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('municipalities_update', 1) }}</div>
                                        <div class="col-md-10">Municiaplidad - Editar</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('municipalities_delete', 1) }}</div>
                                        <div class="col-md-10">Municiaplidad - Eliminar</div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('notaries_index', 1) }}</div>
                                        <div class="col-md-10">Notario - Ver</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('notaries_create', 1) }}</div>
                                        <div class="col-md-10">Notario - Crear</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('notaries_update', 1) }}</div>
                                        <div class="col-md-10">Notario - Editar</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">{{ Form::checkBox('notaries_delete', 1) }}</div>
                                        <div class="col-md-10">Notario - Eliminar</div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Aceptar</button>
                            <a href="{{ URL::route('admin.groups.index') }}" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
                        </div>
                    {{ Form::close() }}
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop