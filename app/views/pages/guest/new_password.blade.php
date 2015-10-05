@extends('layouts.backend.page')

@section('content')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Porfavor, Inicie Sesión</h3>
                    </div>
                    @if(Session::has('mensaje'))
                        <div class="alert alert-{{ Session::get('class') }}"><strong>{{ Session::get('mensaje') }}</strong><button type="button" class="close" data-dismiss="alert">×</button></div>
                    @endif
                    <div class="panel-body">
                        {{ Form::open(['route' => 'new.password.post', 'class' => 'form']) }}
                            <fieldset>
                                {{ Form::hidden('resetcode', $user->reset_password_code) }}
                                {{ Form::hidden('email', $user->email) }}
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Repetir Contraseña" name="re_password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Cambiar Contraseña">
                                <a href="{{ URL::route('home') }}" class="btn btn-lg btn-danger btn-block">Volver</a>
                            </fieldset>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
@stop