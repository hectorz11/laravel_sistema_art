@extends('layouts.base')

@section('content')  	
	<div class="row">
	    <div class="col-md-8 col-md-offset-2">

	    	<div class="section-title center">
	            <h2>Datos de  <strong>Google</strong></h2>
	            <div class="line">
	                <hr>
	            </div>
	            <div class="clearfix"></div>
	            <small><em>Estos datos son sacados de Google API .. gg mitri w peluchin</em></small>            
	        </div>

	        <div class="row">
				{{ Form::open(['route' => 'signup.post']) }}
					<div class="col-lg-6">
						<div class="form-group">
							<img src="{{ $photoURL }}" name="photo" width="250" height="200">
							{{ Form::hidden('photo', $photoURL) }}
						</div>
					</div>
					<div class="col-lg-6">
						{{ Form::hidden('idGg', $idGoogle) }}
						{{ Form::hidden('first_name', $given_name) }}
						{{ Form::hidden('last_name', $family_name) }}
						{{ Form::hidden('gender', $gender) }}
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