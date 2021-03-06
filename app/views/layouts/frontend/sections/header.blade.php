    <!-- Navigation
    ==========================================-->
    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      @if (!Sentry::check())
          <a class="navbar-brand" href="{{ URL::route('home') }}">ART</a>
      @else
        @if (Sentry::hasAccess(['users','admin']))
          <a class="navbar-brand" href="{{ URL::route('admin.dashboard') }}">Admin</a>
          <a class="navbar-brand" href="#">-</a>
          <a class="navbar-brand" href="{{ URL::route('users.dashboard') }}">User</a>
        @elseif (Sentry::hasAccess(['users']))
          <a class="navbar-brand" href="{{ URL::route('users.dashboard') }}">Usuario</a>
        @elseif (Sentry::hasAccess(['admin']))
          <a class="navbar-brand" href="{{ URL::route('admin.dashboard') }}">Administrador</a>       
        @endif
      @endif
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#tf-home" class="page-scroll">Inicio</a></li>
            <li><a href="#tf-about" class="page-scroll">Acerca de</a></li>
            <li><a href="#tf-team" class="page-scroll">Equipo</a></li>
            <li><a href="#tf-services" class="page-scroll">Servicios</a></li>
            <li><a href="#tf-works" class="page-scroll">Portfolio</a></li>
            <li><a href="#tf-testimonials" class="page-scroll">Testimonios</a></li>
            <li><a href="#tf-contact" class="page-scroll">Contacto</a></li>
      @if (!Sentry::check())
            <li><a href="{{ URL::route('signin') }}">Login</a></li>
            <li><a href="{{ URL::route('signup') }}">Register</a></li>
      @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>