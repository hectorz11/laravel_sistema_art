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
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo electrónico</label>
                                    <input type="email" name="email" class="form-control" placeholder="Correo Electrónico">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contraseña</label>
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Comentario</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        
                        <button type="submit" class="btn tf-btn btn-default">Submit</button>
                    </form>
                    <a href="{{ URL::route('signin') }}" class="btn btn-primary btn-lg">Iniciar Sesión</a>
                    <a href="{{ URL::route('signup') }}" class="btn btn-success btn-lg">Registrarse</a>
                @endif
                </div>
            </div>

        </div>
    </div>