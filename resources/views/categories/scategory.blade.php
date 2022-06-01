@extends('layouts.master')

@section('title', 'Butore Store')


@section('content')
<!-- ========================= SECTION FEATURE END// ========================= -->
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
<div class="container">
<header class="section-heading">
<?php $url1 = "Productos/$scobject->Nombre"?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">{{ $scobject->Nombre }}</li>
  </ol>
</nav>
</header><!-- sect-heading -->
<div class="row">
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
   <!-- col.// -->
  @endforeach
</div> <!-- row.// -->
</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<!-- ========================= SECTION CONTENT ========================= -->

@endsection