@extends('layouts.backend.page')

@section('content')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Porfavor coloque sus datos</h3>
                    </div>
                    @if(Session::has('mensaje'))
                        <div class="alert alert-{{ Session::get('class') }}"><strong>{{ Session::get('mensaje') }}</strong><button type="button" class="close" data-dismiss="alert">×</button></div>
                    @endif
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
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Repetir Contraseña" name="re_password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Registrarse">
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ URL::route('home') }}" class="btn btn-lg btn-info btn-block">Home</a>
                                </div>
                            </fieldset>
                        {{ Form::close() }}
                        <p class="or-social">O utilizar una Red Social</p>
                        <a href="{{ route('facebook') }}" class="btn btn-lg btn-primary btn-block facebook" type="submit">Facebook</a>
                        <a href="{{ route('twitter') }}" class="btn btn-lg btn-primary btn-block twitter" type="submit">Twitter</a>
                        <a href="{{ route('google') }}" class="btn btn-lg btn-primary btn-block google" type="submit">Google</a>
                        <a href="{{ route('github') }}" class="btn btn-lg btn-primary btn-block github" type="submit">Git Hub</a>
                    </div>
                </div>
            </div>
        </div>
@stop