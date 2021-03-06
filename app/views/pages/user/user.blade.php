@extends('layouts.backend.base')

@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Panel <small>de Usuario</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Panel
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                @if(Session::has('message'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-{{ Session::get('class') }} alert-dismissable">
                            <button type="button" class="close" datan-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  Bienvenido <strong>{{ Session::get('message') }}</strong>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                @endif

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ count(Deed::whereStatus(1)->get()) }}</div>
                                        <div>Escrituras Públicas</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ URL::route('users.deeds.index') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ count(Agrarian::whereStatus(1)->get()) }}</div>
                                        <div>Expedientes Agrarios</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ URL::route('users.agrarians.index') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ count(Civil::whereStatus(1)->get()) }}</div>
                                        <div>Expedientes Civiles</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ URL::route('users.civils.index') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalle</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ count(Penal::whereStatus(1)->get()) }}</div>
                                        <div>Expedientes Penales</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ URL::route('users.penals.index') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ count(Record::whereStatus(1)->get()) }}</div>
                                        <div>Registros Civiles</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ URL::route('users.records.index') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        
                    </div>
                    <div class="col-lg-3 col-md-6">
                        
                    </div>
                    <div class="col-lg-3 col-md-6">
                        
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> {{ $user->first_name }} {{ $user->last_name }}</h3>
                            </div>
                            <div class="panel-body">
                                <img src="{{ $user->profiles->photo }}">
                                <br><br>
                                <div class="fb-page" data-href="https://www.facebook.com/Archivo-Regional-de-Tacna-275688885934938/timeline/" data-width="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
                                    <div class="fb-xfbml-parse-ignore">
                                        <blockquote cite="https://www.facebook.com/Archivo-Regional-de-Tacna-275688885934938/timeline/">
                                            <a href="https://www.facebook.com/Archivo-Regional-de-Tacna-275688885934938/timeline/">Facebook</a>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/Archivo-Regional-de-Tacna-275688885934938/timeline/" data-width="650" data-numposts="5"></div>
                            
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Archivo Regional de Tacna</h3>
                            </div>
                            <div class="panel-body">
                                <img src="https://scontent-mia1-1.xx.fbcdn.net/hphotos-xfp1/v/t1.0-9/s720x720/12006294_371587943011698_8999573011954923103_n.jpg?oh=1c2d892961b45eadd7fa4fe0ae3ff67d&oe=5661AEC6">
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
@stop

<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4&appId=1575770806035406";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>