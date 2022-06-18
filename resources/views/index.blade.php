@extends('layouts.master')

@section('title', 'Butore Store')


@section('content')

<!-- ========================= SECTION INTRO ========================= -->
<section class="section-intro padding-y-sm">
<div class="container">
@if($errors->any())
            <p class="text-danger">{{ $errors->first() }}</p>
        @endif
<div class="intro-banner-wrap">
  <img src="images/1.jpg" class="img-fluid rounded">
</div>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->
<!-- ========================= SECTION FEATURE ========================= -->
<section class="section-content padding-y-sm">
<div class="container">
</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION FEATURE END// ========================= -->
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
<div class="container">
<header class="section-heading">
  <h3 class="section-title"><a href="/Populares">Productos populares</a></h3>
</header><!-- sect-heading -->
<div class="row">
  <?php 

  $products = \App\Models\Product::all()->where('Novedad',1); 
  $cont = 0;
  $novedades = [];
  foreach($products as $prod){
    $cont++;
    array_push($novedades,$prod->id)
  }

  $randomarray = array(rand(0,$cont));
  $encontrado = false;
  $repetir = true;
  for($i = 1; $i < 8; $i++){
    while($repetir){
      $random = rand(0,$cont);
      for($j = 0; $j < count($randomarray); $j++){
        if($randomarray[$j] == $random){
          $encontrado = true;
        }
      }
      if(!$encontrado){
        array_push($randomarray, $random);
        $repetir = false;
      } else {
        $encontrado = false;
      }
    }
    $repetir = true;
  }
    
  ?>

  @for($i = 0; $i < 8; $i++)
  <?php 
  

  $auxcont = 0;
  foreach($products as $prod){
    $cont++;
  }
  ?>

  @endfor
@foreach($products as $prod)
  <div class="col-md-3">
    <div href="{{ url('/Producto/'. $prod->id) }}" class="card card-product-grid">
      <a href="{{ url('/Producto/'. $prod->id) }}" class="img-wrap"> <img src={{ $prod->Imagen }}> </a>
      <figcaption class="info-wrap">
        <a href="{{ url('/Producto/'. $prod->id) }}" class="title">{{ $prod->Nombre }}</a>
        <div class="price mt-1">{{ sprintf('%.2f',$prod->Precio_individual) }}€</div> <!-- price-wrap.// -->
      </figcaption>
    </div>
  </div>
  @endforeach
</div>
</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION  END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<div>&nbsp</div>
<!-- ========================= SECTION  END// ======================= -->
<section class="section-content padding-y-sm">
<div class="container">
<article class="card card-body">
<div class="row">
  <div class="col-md-4">  
    <figure class="item-feature">
      <span class="text-primary"><i class="fa fa-2x fa-truck"></i></span>
      <figcaption class="pt-3">
        <h5 class="title">Envío rápido</h5>
        <p>Los pedidos llegan en un máximo de 24 horas tras su pago. </p>
      </figcaption>
    </figure> <!-- iconbox // -->
  </div><!-- col // -->
  <div class="col-md-4">
    <figure  class="item-feature">
      <span class="text-primary"><i class="fa fa-2x fa-clock"></i></span>  
      <figcaption class="pt-3">
        <h5 class="title">Disponibilidad 24 horas</h5>
        <p>Realice sus pedidos en el momento que usted desee.
         </p>
      </figcaption>
    </figure> <!-- iconbox // -->
  </div><!-- col // -->
    <div class="col-md-4">
    <figure  class="item-feature">
      <span class="text-primary"><i class="fa fa-2x fa-lock"></i></span>
      <figcaption class="pt-3">
        <h5 class="title">Pago seguro </h5>
        <p>Compromiso de seguridad en el pago de los pedidos.
         </p>
      </figcaption>
    </figure> <!-- iconbox // -->
  </div> <!-- col // -->
</div>
</article>
</div> <!-- container .//  -->
</section>
<div>&nbsp</div>
<div>&nbsp</div>

@endsection
