<!DOCTYPE html>
<html lang="es-PE">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <pre>
        <h2>Restablecimiento de contraseña</h2>
        
        <div>
            Ha solicitado para restablecer tu contraseña. Siga el siguiente enlace para cambiar su contraseña
            <br/>
            <a href="{{ URL::to('/new/password') }}?email={{$email}}&resetcode={{$resetCode}}">
                {{ URL::to('/new/password') }}?email={{$email}}&resetcode={{$resetCode}}
            </a>
        </div>
    </body>
</html>