@extends('layouts.backend.page')

@section('content')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Porfavor coloque sus datos</h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(['route' => 'signup.post', 'class' => 'form']) }}
                            <fieldset>
                                {{ Form::hidden('provider', 'ART') }}
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nombre(s)" name="first_name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Apellidos" name="last_name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Fecha de Nacamiento" name="birthday" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Repetir Contraseña" name="re_password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Registrar">
                                <a href="{{ URL::route('home') }}" class="btn btn-lg btn-danger btn-block">Volver</a>
                            </fieldset>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
@stop