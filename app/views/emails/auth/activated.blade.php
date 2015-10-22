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
                <span style="color: green;">Hola {{ $email }}. Bienvenido a nuestra red!</span>
                <br>
                <span style="color: green;">Su contraseña es la siguiente: {{ $password }}</span>
                <br>
                Completa el registro, con el siguiente enlace:
                <br>
                <a href="{{ URL::to('register') }}/{{ $userId }}/activated/{{ urlencode($activationCode) }}" class="button" style="background: green;">Pulsa aqui para confirar tu email</a>
                <br>
                <span>Si no funciona este enlace, copia y pega en tu navegador:</span>
                <a href="{{ URL::to('register') }}/{{ $userId }}/activated/{{ urlencode($activationCode) }}">
                	{{ URL::to('register') }}/{{ $userId }}/activated/{{ urlencode($activationCode) }}
                </a>
            </td>
        </tr>
    </table>
</body>
</html>