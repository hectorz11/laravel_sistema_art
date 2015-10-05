@extends('layouts.backend.page')

@section('content')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Porfavor, Inicie Sesión</h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(['route' => 'signin.post', 'class' => 'form']) }}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                            </fieldset>
                        {{ Form::close() }}
                        <p><a href="#">¿Se te olvidó tu contraseña?</a></p>
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