@extends('layouts.base')

@section('content')  	
	<div class="row">
	    <div class="col-md-8 col-md-offset-2">

	    	<div class="section-title center">
	            <h2>Datos de  <strong>Facebook</strong></h2>
	            <div class="line">
	                <hr>
	            </div>
	            <div class="clearfix"></div>
	            <small><em>Estos datos son sacados del facebook .. gg mitri w peluchin</em></small>            
	        </div>

	        <div class="row">
				{{ Form::open(['route' => 'signup.post']) }}
					<div class="col-lg-6">
						<div class="form-group">
							<img src="{{ $photoURL }}" width="250" height="200">
							{{ Form::hidden('photo', $photoURL) }}
						</div>
					</div>
					<div class="col-lg-6">
						{{ Form::hidden('social_id', $idFb) }}
						{{ Form::hidden('birthday', $birthday) }}
						{{ Form::hidden('first_name', $first_name) }}
						{{ Form::hidden('last_name', $last_name) }}
						{{ Form::hidden('gender', $gender) }}
						{{ Form::hidden('token', $token) }}
						{{ Form::hidden('provider', $provider) }}
						<div class="form-group">
							<label>Email</label>
							{{ Form::email('email', $email, ['class' => 'form-control']) }}
						</div>
						<div class="form-group">
							<label>Contraseña</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<label>Repetir contraseña</label>
							<input type="password" name="re_password" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Aceptar</button>
                        <a href="{{ URL::route('home') }}" class="btn btn-danger">Cancelar</a>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop