    <!-- Contact Section
    ==========================================-->
    <div id="tf-contact" class="text-center">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="section-title center">
                        <h2>SIÉNTETE LIBRE DE <strong>CONTACTARNOS</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                        <small><em>Los usuarios que publiquen mensajes agresivos en el Muro, insultos, difamación del 
                        servicio o derivados; serán bloqueados de nuestra pagina y Denunciados a Facebook (según las 
                        politicas actuales) para la posterior eliminación de su perfil, sin posibilidad a recuperar su 
                        información, fotos, videos, notas, etc.
                        También serán denunciados por SPAM, los usuarios que publiquen ENLACES a otros grupos o páginas, 
                        internas o externas de Facebook, con la consecuencia de El bloqueo y Eliminación de su perfil.
                        </em></small>
                    </div>
                @if (Sentry::check())
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo Electrónico</label>
                                    <input type="email" name="email" class="form-control" placeholder="Correo Electrónico" value="{{ Sentry::getUser()->email }}">
                                </div>
                            </div>
                        </div>
                        {{ Form::hidden('password', Sentry::getUser()->password ) }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Comentario</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        
                        <button type="submit" class="btn tf-btn btn-default">Enviar</button>
                    </form>
                @else
                    <!-- Begin MailChimp Signup Form -->
                    <link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
                    <style type="text/css">
                        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
                        /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                    </style>
                    <div id="mc_embed_signup">
                        <form action="//redaventura.us12.list-manage.com/subscribe/post?u=d8944e7916f28595a01a00794&amp;id=7a1bc8d8cc" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                                <h2>Subscribirse al Archivo Regional de Tacna</h2>
                                    <div class="indicates-required">
                                        <span class="asterisk">*</span> indicates required
                                    </div>
                                    <div class="mc-field-group">
                                        <label for="mce-EMAIL">Email Address  
                                            <span class="asterisk">*</span>
                                        </label>
                                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                                    </div>
                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;">
                                    <input type="text" name="b_d8944e7916f28595a01a00794_7a1bc8d8cc" tabindex="-1" value="">
                                </div>
                                <div class="clear">
                                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                                </div>
                            </div>
                        </form>
                    </div>
                    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
                    <script type='text/javascript'>
                        (function($) 
                            {
                                window.fnames = new Array(); 
                                window.ftypes = new Array();fnames[0]='EMAIL';
                                ftypes[0]='email';
                                fnames[1]='FNAME';
                                ftypes[1]='text';
                                fnames[2]='LNAME';
                                ftypes[2]='text';
                                fnames[3]='MMERGE3';
                                ftypes[3]='url';
                            }(jQuery));

                        var $mcj = jQuery.noConflict(true);
                    </script>
                    <!--End mc_embed_signup-->
                    <!--{{ Form::open(['route' => 'subscribe']) }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo electrónico</label>
                                    <input type="email" name="email" class="form-control" placeholder="Correo Electrónico">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn tf-btn btn-default btn-lg">Subscribirse</button>
                    {{ Form::close() }}-->

                    <div class="row">
                        <div class="col-md-4 col-sm-6 service">
                            <a href="{{ URL::route('signin') }}" class="btn btn-primary btn-lg">Iniciar Sesión</a>
                        </div>
                        <div class="col-md-4 col-sm-6 service">
                            <a href="{{ URL::route('signup') }}" class="btn btn-success btn-lg">Registrarse</a>
                        </div>
                    </div>
                @endif
                </div>
            </div>

        </div>
    </div>