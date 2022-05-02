@extends('layouts.master')

@section('title', 'Butore Store')


@section('content')
<section class="section-content">
<div class="container">
<header class="section-heading">
    <h3 class="section-title">Cupones de descuento</h3>      
</header><!-- sect-heading -->
<div class="row">
@foreach($coupons as $coup)
  <div class="col-md-3">
    <div href="" class="card card-product-grid">
        <?php 
            $c = App\Models\Coupon::findOrFail($coup->coupon_id);
            $prod = App\Models\Product::findOrFail($c->product_id);
        ?>
      <a href="{{ url('/Producto/'. $prod->id) }}" class="img-wrap"> <img src="{{ $prod->Imagen }}"> </a>
      <figcaption class="info-wrap">
      <a href="" class="title"><strong> {{ $prod->Nombre }} </strong></a>
      <div>Descuento: {{ sprintf('%.2f',$c->Descuento) }}€</div> <!-- price-wrap.// -->
      <?php 
            $pedido = 0;
              foreach($cart as $item){
                if($item->id == $prod->id){
                  $pedido += $item->qty;
                }
              }
            ?>
      @if($coup->Cantidad - $pedido > 0)
        <div>Tienes: {{ $coup->Cantidad - $pedido }}</input></div>
        <form action="/Carrito/{{ $prod->id }}/{{ $coup->Cantidad - $pedido }}">
        <div><p class="text-center"><button type="submit" class="btn btn-primary">Canjear</button></p></div>
        </form>
    @else
      @if($coup->Cantidad - $pedido < 0)
        <div>Tienes: 0</input></div>
      @else
        <div>Tienes: {{ $coup->Cantidad - $pedido }}</input></div>
      @endif
        <form action="/Carrito/{{ $prod->id }}/{{ $coup->Cantidad }}">
        <div><p class="text-center"><button type="submit" class="btn btn-primary" href="" disabled>Canjear</button></p></div>
        </form>
    @endif
      </figcaption>
    </div>
  </div>
   <!-- col.// -->
  @endforeach
</div> <!-- container .//  -->
</section>
@endsection