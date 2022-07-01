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
  <img src="images/3.jpg" class="img-fluid rounded">
</div>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->
<!-- ========================= SECTION FEATURE ========================= -->
<?php 

  $products = \App\Models\Product::all()->where('Novedad',1); 
  $cont = 0;
  $novedades = [];
  foreach($products as $prod){
    $cont++;
    array_push($novedades,$prod->id);
  }

  $totalnovedades = 8;
  if(count($novedades) < 8){
    $totalnovedades = count($novedades);
  }



  $aux=0;
  if(count($novedades) == 0){ $aux = 1; } else { $aux = count($novedades); }
  ?>
  @if(count($novedades) > 0)
<section class="section-content padding-y-sm">
<div class="container">
</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION FEATURE END// ========================= -->
<!-- ========================= SECTION CONTENT ========================= -->


<section class="section-content">
<div class="container">
<header class="section-heading">
  <h3 class="section-title"><a href="/Novedades">Sección de Novedades</a></h3>
</header><!-- sect-heading -->
<div class="row">
  
  <?php
  $randomarray = array(rand(0,$aux-1));
  $encontrado = false;
  $repetir = true;
  for($i = 1; $i < $totalnovedades; $i++){
    while($repetir){
      $random = rand(0,$aux-1);
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

  @foreach($randomarray as $ra)
  <?php 
  if(count($novedades) > 0){
    $id = $novedades[$ra];
    $prod = \App\Models\Product::findOrFail($id);
  } else {
    $prod = new \App\Models\Product();
  }
    //echo $id;
  ?>
  <div class="col-md-3">
    <div href="{{ url('/Producto/'. $prod->id) }}" class="card card-product-grid">
      <a href="{{ url('/Producto/'. $prod->id) }}" class="img-wrap"> <img src={{ $prod->Imagen }}> </a>
      <figcaption class="info-wrap">
        <a href="{{ url('/Producto/'. $prod->id) }}" class="title">{{ $prod->Nombre }}</a>
        <div class="price mt-1">{{ sprintf('%.2f',$prod->Precio_individual) }}€</div> 
      </figcaption>
    </div>
  </div>

  @endforeach
</div>
</div> <!-- container .//  -->
</section>
@endif
<!-- ========================= SECTION  END// ========================= -->
<?php 

  $cont = 0;
  $categorias = [];
  foreach($concretecategories as $c){
    $cont++;
    array_push($categorias,$c->id);
  }
  do{
  $selected = rand(0,$cont-1);

  $productos = \App\Models\Product::all()->where('concretecategory_id',$categorias[$selected]);
  $cont2 = 0;
  $prods = [];
  foreach($productos as $p){
    $cont2++;
    array_push($prods,$p->id);
    //echo $p->id.' ';
  }

  $totalprodscat = 8;
  if(count($prods) < 8){
    $totalprodscat = count($prods);
  }

  $aux = 0;
  if(count($prods) == 0){ $aux = 1; } else { $aux = count($prods); }
  } while (count($prods) == 0);
  $randomarray2 = array(rand(0,$aux-1));
  $encontrado = false;
  $repetir = true;
  for($i = 1; $i < $totalprodscat; $i++){
    while($repetir){
      $random = rand(0,$aux-1);
      for($j = 0; $j < count($randomarray2); $j++){
        if($randomarray2[$j] == $random){
          $encontrado = true;
        }
      }
      if(!$encontrado){
        array_push($randomarray2, $random);
        $repetir = false;
      } else {
        $encontrado = false;
      }
    }
    $repetir = true;
  }
    
  $cat = \App\Models\Concretecategory::findOrFail($categorias[$selected]);
  $scat = \App\Models\Supercategory::findOrFail($cat->supercategory_id);
  ?>
<section class="section-content">
<div class="container">
<header class="section-heading">
  <h3 class="section-title"><a href="{{ url('/Productos/'.$scat->Nombre.'/'.$cat->Nombre) }}">Mira nuestras ofertas en {{ $cat->Nombre }}</a></h3>
</header><!-- sect-heading -->
<div class="row">
  

  @foreach($randomarray2 as $ra)
  <?php 
    $id = $prods[$ra];
    $prod = \App\Models\Product::findOrFail($id);
    
    //echo $id;
  ?>
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
        <p>Los pedidos llegan en un máximo de 24 horas tras su pago (domnigos y festivos no incluidos). </p>
      </figcaption>
    </figure> <!-- iconbox // -->
  </div><!-- col // -->
  <div class="col-md-4">
    <figure  class="item-feature">
      <span class="text-primary"><i class="fa fa-2x fa-clock"></i></span>  
      <figcaption class="pt-3">
        <h5 class="title">Disponibilidad 24 horas</h5>
        <p>Realice sus pedidos en el momento del día que usted desee.
         </p>
      </figcaption>
    </figure> <!-- iconbox // -->
  </div><!-- col // -->
    <div class="col-md-4">
    <figure  class="item-feature">
      <span class="text-primary"><i class="fa fa-2x fa-lock"></i></span>
      <figcaption class="pt-3">
        <h5 class="title">Pagos y envíos seguros </h5>
        <p>Compromiso de seguridad en el pago de los pedidos y con confirmación de recepción.
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
