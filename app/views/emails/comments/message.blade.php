<!DOCTYPE html>
<html lang="en" style="width: 100%; height: 500px;">
<head>
    <meta charset="UTF-8">
    <title>Red aventura</title>
    <style>
        .button {
            -webkit-appearance: none;
        	-moz-appearance: none;
        	appearance: none;
        	border: 0;
        	// outline: 0;
        	padding: 0;
            color: white;
            background-color: green;
            padding: 1em;
            border-radius: 0.3em;
            text-decoration: none;

            cursor: pointer;
        	display: inline-block;
        	transform: scale(1);

        	/* transition */
            transition-duration: 0.2s;
            transition-property: transform;
            transition-timing-function: ease;

        	&:active {
        		transform: scale(0.9);
        	}
        }
    </style>
</head>
<body style="width: 100%; height: 500px;">
    <table style="margin: 0 auto; max-width: 500px; width: 100%; height: 500px;">
        <tr>
            <td style="text-align: center; vertical-align: middle;">
                <img src="" alt="" />
                <span style="color: green;">Hola Jorge Linares. Bienvenido a nuestra red!</span>
                <br>
                Completa el registro, con el siguiente enlace:
                <br>
                <a href="#" class="button" style="background: green;">Pulsa aqui para confirar tu email</a>
                <br>
                <span>Si no funciona este enlace, copia y pega en tu navegador:</span>
                <a href="#">http://localhost/api_redaventura/public/email</a>
            </td>
        </tr>
    </table>
</body>
</html>

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