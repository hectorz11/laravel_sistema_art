@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editar <small>Comentario</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ URL::route('users.dashboard') }}"><i class="fa fa-dashboard"></i> Panel</a>
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
                    {{ Form::open(['route' => ['admin.agrarians.update', $comment->id], 'method' => 'PUT']) }}
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Comentario</label>
                                {{ Form::textArea('description', $comment->description, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Comentario']) }}
                            </div>
                            @if( $errors->has('description') )
                                <div class="alert alert-danger">
                                  @foreach($errors->get('description') as $error)
                                    * {{$error}}</br>
                                  @endforeach
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-check-circle-o"></i> Aceptar</button>
                        <a href="{{ URL::route('users.comments.index') }}" class="btn btn-lg btn-danger"><i class="fa fa-times-circle-o"></i> Cancelar</a>
                    {{ Form::close() }}
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop