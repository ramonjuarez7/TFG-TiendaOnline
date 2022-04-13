@extends('layouts.master')

@section('title', 'Búsqueda')


@section('content')

<section class="section-content">
<div class="container">
<header class="section-heading">
    <h3 class="section-title">Búsqueda</h3>      
    <a>Mostrando resultados de: {{ $busqueda }} </a>
</header><!-- sect-heading -->
  @for($i = 1; $i < sizeof($products) / 4 + 1; $i++)
<div class="row">
    @for($j = 0; $j < 4; $j++)
  <div class="col-md-3">
    <div href="{{ url('/Producto/'. $products[$j * $i]->id) }}" class="card card-product-grid">
      <a href="{{ url('/Producto/'. $products[$j * $i]->id) }}" class="img-wrap"> <img src={{ $products[$j * $i]->Imagen }}> </a>
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
@endsection