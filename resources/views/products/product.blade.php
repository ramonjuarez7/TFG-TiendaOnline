@extends('layouts.master')

@section('title', 'Butore Store')


@section('content')

<section class="section-content">
<div class="container">
<header class="section-heading">
    <?php $url1 = "Productos/$scat->Nombre"?>
    <?php $url2 = "Productos/$scat->Nombre/$ccat->Nombre"?>
    <a class="link" href="{{ url($url1) }}">{{ $scat->Nombre }}</a>&nbsp→&nbsp<a class="link" href="{{ url($url2) }}">{{ $ccat->Nombre }}</a>
    <h3 class="section-title">{{ $producto->Nombre }}</h3>      
    <a> </a>
</header><!-- sect-heading -->
<div class="row">
  <div class="col-md-3">
    <div href="#" class="card">
      <a class="img-wrap"> <img src={{ $producto->Imagen }}> </img></a>
      <figcaption class="info-wrap">
        <a href="#" class="title"></a>
      </figcaption>
    </div>
  </div> <!-- col.// -->
  <div class="col-md-3 col-lg-8">
      <div>
        <a><strong>Información:</strong> {{ $producto->Informacion }} </a>
      </div>
      <div>
        <a><strong>Precio:</strong> {{ $producto->Precio_individual }}€ </a>
      </div>
      @if($producto->medicion)
        <div>
            <a><strong>Peso:</strong> {{ $producto->Peso_volumen }}Kg </a>
        </div>
        <div>
            <a><strong>El kilo sale a:</strong> {{ $producto->Precio_peso_volumen }}€ </a>
        </div>
        @else
        <div>
            <a><strong>Volumen:</strong> {{ $producto->Peso_volumen }}L </a>
        </div>
        <div>
            <a><strong>El litro sale a:</strong> {{ $producto->Precio_peso_volumen }}€ </a>
        </div>
        @endif
      <div>
            <a><strong>Código de barras:</strong> {{ $producto->Codigo_barras }}</a>
      </div>
      <div>
      &nbsp
      <?php $num = 0 ?>
      </div> 
            <script language="javascript"> 
              var i = 1; 
              function contadormas(stock){
                if(i<stock){ 
                  i = i + 1; 
                  var cant = document.getElementById("cantidad"); 
                  cant.value = i;
                  if(cant.value == 1){
                          i=1;
                          cant.value=1;
                  }
                }
              }
              function contadormenos(){ 
                if(i>=2){
                    i = i - 1; 
                    var cant = document.getElementById("cantidad"); 
                    cant.value = i;
                    if(cant.value == 1){
                        i=1;
                        cant.value=1;
                    }
                }
              }
            </script>
            <?php 
            $pedido = 0;
              foreach($cart as $item){
                if($item->id == $producto->id){
                  $pedido += $item->qty;
                }
              }
            ?>
          <form action="/Carrito/{{ $producto->id }}">
            <div class="input-group">
              <button class="btn btn btn-light" type="button" id="menos" onclick="javascript: contadormenos()">-</button>
              <input id="cantidad" name="cantidad" type="text" style="text-align: center;width : 50px; heigth : 50px;" value="1" readonly>
              <button class="btn btn btn-light" type="button" id="mas" onclick="javascript: contadormas({{ $producto->Maximo_pedido - $pedido }})">+</button>
            </div>
            <div>
            &nbsp
            </div>           
            <div>
              @if($producto->Maximo_pedido - $pedido > 0)
              <button type="submit" class="btn btn-primary">Añadir al carro</button>
              @else
              <button type="submit" class="btn btn-primary" disabled>Añadir al carro</button>
              <p class="text-danger">Ya has incluido en tu carrito el máximo permitido de este producto.</p>
              @endif
            </div>
          </form>
      
    
    
  </div> <!-- col.// -->
</div> <!-- row.// -->
<p>&nbsp</p>
</div> <!-- container .//  -->
</section>
@endsection