@extends('layouts.backend.email')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Bienvenido a la Plataforma del Archivo Regional de Tacna</h3>
			</div>
			<div class="panel-body">
			    <form>
					<fieldset>
						<div class="form-group">
							<label>Cuenta</label>
							<input class="form-control" name="email" type="email" value="{{ $email }}">
						</div>
						<div class="form-group">
							<label>Contraseña</label>
							<input class="form-control" name="password" type="text" value="{{ $password }}" autofocus>
						</div>
					</fieldset>
				</form>
				<a href="{{ URL::to('register') }}/{{ $userId }}/activated/{{ urlencode($activationCode) }}" class="btn btn-link">Clic aquí.</a>
				<p class="or-social">O apuntar su navegador a esta dirección</p>
				{{ URL::to('register') }}/{{ $userId }}/activated/{{ urlencode($activationCode) }}
			</div>
			~The Support Team Archivo Regional Tacna.
		</div>
	</div>
</div>
@stop