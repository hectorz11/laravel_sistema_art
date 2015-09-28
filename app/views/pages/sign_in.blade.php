<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('/zapana/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/hector/css/signin.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('/zapana/css/sb-admin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ URL::asset('/zapana/css/plugins/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::asset('/zapana/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
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
    </div>

    <!-- jQuery -->
    <script src="{{ URL::asset('/zapana/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('/zapana/js/bootstrap.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ URL::asset('/zapana/js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ URL::asset('/zapana/js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ URL::asset('/zapana/js/plugins/morris/morris-data.js') }}"></script>

</body>

</html>