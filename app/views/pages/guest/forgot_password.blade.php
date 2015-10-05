@extends('layouts.backend.page')

@section('content')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Porfavor coloque sus Correo Electrónico</h3>
                    </div>
                    @if(Session::has('mensaje'))
                        <div class="alert alert-{{ Session::get('class') }}"><strong>{{ Session::get('mensaje') }}</strong><button type="button" class="close" data-dismiss="alert">×</button></div>
                    @endif
                    <div class="panel-body">
                        {{ Form::open(['route' => 'forgot.password.post', 'class' => 'form']) }}
                            <fieldset>
                                {{ Form::hidden('provider', 'ART') }}
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Aceptar">
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ URL::route('home') }}" class="btn btn-lg btn-info btn-block">Home</a>
                                </div>
                            </fieldset>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
@stop