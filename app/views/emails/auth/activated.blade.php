<meta charset="utf-8" />
  
<h2>Bienvenido a la Plataforma del Archivo Regional de Tacna</h2>
<b>----------------------------------------------------------------------------------------------------------</b>
<br>
<b>Ingrese con estos datos - Sistema ART</b><br>
<b>Cuenta:</b> {{ $email }}<br>
<b>Contraseña:</b> {{ $password }}<br>
<br>
Para activar su cuenta haga 
<a href="{{ URL::to('register') }}/{{ $userId }}/activated/{{ urlencode($activationCode) }}"> click aqui.</a>
<br>
O apuntar su navegador a esta dirección:
{{ URL::to('register') }}/{{ $userId }}/activated/{{ urlencode($activationCode) }}
<br>  
Gracias
<br>
    ~The Support Team Redaventura.