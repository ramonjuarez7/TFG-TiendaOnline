@extends('layouts.master')

@section('title', 'Resultados')


@section('content')

<section class="section-content">
<div class="container">
<header class="section-heading">
    <h3 class="section-title">Búsqueda</h3>      
    <a>Mostrando resultados de: {{ $busqueda }} </a>
</header><!-- sect-heading -->
<div class="row">
@foreach($products as $prod)
  <div class="col-md-3">
    <div href="{{ url('/Producto/'. $prod->id) }}" class="card card-product-grid">
      <a href="{{ url('/Producto/'. $prod->id) }}" class="img-wrap"> <img src={{ $prod->Imagen }}> </a>
      <figcaption class="info-wrap">
        <a href="{{ url('/Producto/'. $prod->id) }}" class="title">{{ $prod->Nombre }}</a>
        <div class="price mt-1">{{ $prod->Precio_individual }}€</div> <!-- price-wrap.// -->
      </figcaption>
    </div>
  </div>
   <!-- col.// -->
  @endforeach
</div> <!-- container .//  -->
</section>
@endsection