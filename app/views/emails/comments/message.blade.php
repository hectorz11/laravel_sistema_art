@extends('layouts.backend.email')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Respuesta</h3>
			</div>
			<div class="panel-body">
			    <form>
					<fieldset>
						<div class="form-group">
							<label>Cuenta</label>
							<input class="form-control" name="email" type="email" placeholder="{{ $email }}">
						</div>
						<div class="form-group">
							<label>Comentario</label>
							<textarea class="form-control" name="description" rows="3">{{ $description }}</textarea>
						</div>
						<div class="form-group">
							<label>Respuesta</label>
							<textarea class="form-control" name="answer" rows="3">{{ $answer }}</textarea>
						</div>
					</fieldset>
				</form>
			</div>
			~The Support Team Archivo Regional Tacna.
		</div>
	</div>
</div>
@stop