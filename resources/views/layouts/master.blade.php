<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        
<!--
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
-->
        <link rel="icon" href="{{ asset('images/items/1.jpg') }}" type="image/x-icon"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       <!-- Custom styles for this template -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/ui.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
        
        <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
        <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
    </head>
    <body>
       
<header class="section-header">
<nav class="navbar navbar-dark navbar-expand p-0 bg-primary">
<div class="container">
    <ul class="navbar-nav d-none d-md-flex mr-auto">
    <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
    @guest

    @else
    <?php $email = \Auth::user()->Email;
          $usuario = \App\Models\User::where('Email',$email)->firstOrFail(); 
    ?>
      @if($usuario->Privilegios == true)
      <li class="nav-item"><a class="nav-link" href="/Administracion">Panel de Administrador</a></li>
      @endif

    @endguest
    </ul>
    <ul class="navbar-nav">
    <li  class="nav-item"><a href="/Contact" class="nav-link"> Info: rjc13@alu.ua.es </a></li>

  </ul> <!-- list-inline //  -->
  
</div> <!-- container //  -->
</nav> <!-- header-top-light.// -->
<section class="header-main border-bottom">
  <div class="container">
<div class="row align-items-center">
  <div class="col-lg-2 col-6">
    <a href="/" class="brand-wrap">
      Butore Store
    </a> <!-- brand-wrap.// -->
  </div>
  <div class="col-lg-6 col-12 col-sm-12">
    <form action="/Buscar" class="search">
      <div class="input-group w-100">
          <input type="text" name="buscar" class="form-control" placeholder="Buscar">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
    </form> <!-- search-wrap .end// -->
  </div> <!-- col.// -->
  <div class="col-lg-4 col-sm-6 col-12">
    <div class="widgets-wrap float-md-right">
      <div class="widget-header  mr-3">
        <a href="/Carrito" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
        <?php 
        $total = 0;
        foreach($cart as $item){
          $total += $item->qty;
        } ?>
        <span class="badge badge-pill badge-danger notify">{{ $total }}</span>
      </div>
      <div class="widget-header icontext">
        @guest
        <a href="/Login" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
        @else
        <a href="/Perfil" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
        @endguest
        <div class="text">
          <span class="text-muted">¡Bienvenido!</span>
          <div> 
            @guest
            <a href="/Login">Iniciar Sesión</a> |  
            <a href="/Registro"> Registro</a>
            @else
            <a href="/Pedidos">Mis pedidos</a> |
            <a href="/Cupones">Mis cupones</a> |
            <a class="nav-item nav-link text-light" method='POST' tooltip="prueba" href="{{ url('/Logout') }}">
                <i class="fas fa-sign-out-alt"> Cerrar Sesión</i>
            </a> 
            @endguest
          </div>
        </div>
      </div>
    </div> <!-- widgets-wrap.// -->
  </div> <!-- col.// -->
</div> <!-- row.// -->
  </div> <!-- container.// -->
</section> <!-- header-main .// -->
<nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main_nav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="btn btn-outline-primary" href="" role="button" data-toggle="modal" data-target="#modalArticulos" data-keyboard="false" data-backdrop="static"><strong>Lector de códigos</strong></a>

          <!-- modal-->
          <form action="{{ url('/Lector') }}" method="POST">
            @csrf
          <div class="modal fade" id="modalArticulos" tabindex="-1" role="dialog" aria-labelledby="modalArticulosLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalArticulosLabel">Ingreso de Artículos</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Escanear Código de Barras</label>
                    <div class="row">
                      <div class="col col-lg-12">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <i class="fa fa-barcode"></i>
                                  </div>
                              </div>
                              <input type="text" class="form-control producto" name="codigoEscaneado" id="codigoEscaneado">
                          </div>
                      </div>
                  </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCerrarModal">Cerrar</button>
                  <button type="submit" class="btn btn-primary" id="btnAgregar">Buscar</button>
                </div>
              </div>
            </div>
          </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="navbar-text"><strong>&nbsp &nbsp Categorías:</strong></a>
        </li>
          @foreach ($supercategories as $key)
        <li class="nav-item dropdown">
        <?php $url1 = "Productos/$key->Nombre"?>
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ url($url1) }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">      {{ $key->Nombre }}      </a>  
          <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ url($url1) }}">{{ $key->Nombre }}</a>
          <div class="dropdown-divider"></div>
                @foreach ($concretecategories as $key2)
                  @if($key2->supercategory_id === $key->id)
                  <?php $url2 = "Productos/$key->Nombre/$key2->Nombre"?>
                  <a class="dropdown-item" href="{{ url($url2) }}">{{ $key2->Nombre }}</a> 
                  @endif
                @endforeach          
          </div>         
        </li>
            @endforeach
      </ul>
    </div> <!-- collapse .// -->
  </div> <!-- container .// -->
</nav>
</header> <!-- section-header.// -->

<div class = "container-fluid" style="margin-top:30px;">
@yield('content')
</div>

<!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top bg">
  <div class="container">
    <section class="footer-top  padding-y">
      <div class="row">
        <aside class="col-md col-6">
          <h6 class="title">Compañía</h6>
          <ul class="list-unstyled">
            <li> <a href="/About">Sobre nosotros</a></li>
            <li> <a href="/Contact">Contáctanos</a></li>
          </ul>
        </aside>
        <aside class="col-md col-6">
          <h6 class="title">Usuario</h6>
          <ul class="list-unstyled">
            @guest
            <li> <a href="/Login"> Iniciar Sesión </a></li>
            <li> <a href="/Registro"> Registro </a></li>
            @else
            <li> <a href="/Perfil"> Perfil </a></li>
            <li> <a href="/Pedidos"> Mis Pedidos </a></li>
            <li> <a href="/Cupones"> Mis cupones </a></li>
            @endguest
          </ul>
        </aside>
        <aside class="col-md">
          <h6 class="title">Redes sociales</h6>
          <ul class="list-unstyled">
            <li><a href=""> <i class="fab fa-facebook"></i> Facebook </a></li>
            <li><a href=""> <i class="fab fa-twitter"></i> Twitter </a></li>
            <li><a href=""> <i class="fab fa-instagram"></i> Instagram </a></li>
          </ul>
        </aside>
      </div> <!-- row.// -->
    </section>  <!-- footer-top.// -->
    <section class="footer-bottom row">
      <div class="col-md-2">
        <p class="text-muted">   2022 Butore Store </p>
      </div>
      <div class="col-md-8 text-md-center">
        <span  class="px-2">rjc13@alu.ua.es</span>
        <span  class="px-2">+34 677 890 580</span>
      </div>
      <div class="col-md-2 text-md-right text-muted">
        <i class="fab fa-lg fa-cc-visa"></i> 
        <i class="fab fa-lg fa-cc-paypal"></i> 
        <i class="fab fa-lg fa-cc-mastercard"></i>
      </div>
    </section>
  </div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->
        
    </body>
</html>