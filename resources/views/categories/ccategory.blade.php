@extends('layouts.master')

@section('title', 'Butore Store')


@section('content')
<!-- ========================= SECTION FEATURE END// ========================= -->
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
<div class="container">
<header class="section-heading">
<?php $url1 = "Productos/$scobject->Nombre"?>
    <a class="link" href="{{ url($url1) }}">{{ $scobject->Nombre }}</a>&nbsp→&nbsp<a class="text">{{ $ccobject->Nombre }}</a>
  <h3 class="section-title">{{ $ccobject->Nombre }}</h3>
</header><!-- sect-heading -->
  @for($i = 1; $i < sizeof($products) / 4 + 1; $i++)
<div class="row">
    @for($j = 0; $j < 4; $j++)
  <div class="col-md-3">
    <div href="#" class="card card-product-grid">
      <a href="#" class="img-wrap"> <img src={{ $products[$j * $i]->Imagen }}> </a>
      <figcaption class="info-wrap">
        <a href="#" class="title">{{ $products[$j * $i]->Nombre }}</a>
        <div class="price mt-1">{{ $products[$j * $i]->Precio_individual }}€</div> <!-- price-wrap.// -->
      </figcaption>
    </div>
  </div> <!-- col.// -->
  @endfor
</div> <!-- row.// -->
@endfor
</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<!-- ========================= SECTION CONTENT ========================= -->

@endsection