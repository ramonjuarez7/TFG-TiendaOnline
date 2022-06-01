@extends('layouts.master')

@section('title', 'Butore Store - Pedidos')


@section('content')

<div class="container">
<header class="section-heading">
  <h3 class="section-title">Pedidos</h3>
</header>
<?php $email = \Auth::user()->Email;
      $usuario = \App\Models\User::where('Email',$email)->firstOrFail();
?>
<p><strong>Pendientes de pago:</strong></p>
<div class="row">

@foreach(array_reverse($orders) as $ord)
@if($ord->Pagado == false)

<div class="col col-lg-6">
        <div class="card">
            <div class="card-header bg-light mb-3">
                <p>
                    <strong>Fecha: </strong> {{ $ord->Fecha }} 
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <strong>Pagado: </strong><?php if($ord->Pagado){echo "Sí";}else{echo "No";}?>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    
                    <strong>Entregado: </strong><?php if($ord->Entregado){echo "Sí";}else{echo "No";}?>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <strong>Total: </strong>{{ sprintf('%.2f',$ord->Precio_total) }}€
                </p>
            </div>
            <div class="card-body text-center">
            <button type="button" class="btn btn-light" data-toggle="collapse" href="#collapse{{ $ord->id }}">Ver Detalles</button>
                <div id="collapse{{ $ord->id }}" class="collapse">
                    <div>
                    &nbsp
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Línea</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Desc.</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $datos = \DB::select('SELECT * FROM order_product WHERE order_id ='. $ord->id) ?>
                                    @foreach($datos as $prod)
                                        <tr>
                                        @if($prod->product_id != null)
                                            <?php $p = App\Models\Product::findOrFail($prod->product_id) ?>
                                            <th scope="row">{{ $prod->Linea }}</th>
                                            <td>{{ $p->Nombre }}</td>
                                            <td>{{ $prod->Cantidad }}</td>
                                            <td>{{ sprintf('%.2f',$p->Precio_individual) }}€</td>
                                            <td>{{ sprintf('%.2f',$prod->Descuento) }}€</td>
                                            <td>{{ sprintf('%.2f',$prod->Precio * $prod->Cantidad - $prod->Descuento) }}€</td>
                                        @else
                                            <th scope="row">{{ $prod->Linea }}</th>
                                            <td>NULL</td>
                                            <td>{{ $prod->Cantidad }}</td>
                                            <td>NULL</td>
                                            <td>{{ sprintf('%.2f',$prod->Descuento) }}€</td>
                                            <td>{{ sprintf('%.2f',$prod->Precio * $prod->Cantidad - $prod->Descuento) }}€</td>
                                        @endif
                                        </tr>
                                        
                                @endforeach
                                <tr>
                                    <?php $p = App\Models\Product::findOrFail($prod->product_id) ?>
                                    <th scope="row">Total</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>{{ sprintf('%.2f',$ord->Precio_total) }}€</strong></td>
                                </tr>
                                </tbody>
                            </table>
                            @if(!$ord->Pagado)
                            <p class="text-danger text-left">El pedido no será procesado hasta que no se realice el pago.</p>
                            <a type="button" class="btn btn-outline-primary" href="{{ url('/Pago/'.$ord->id) }}">Pagar ahora</a>
                            <a type="button" class="btn btn-outline-danger" href="{{ url('/Pedidos/Anular/'.$ord->id) }}">Anular pedido</a>
                            @endif
                        </div>
                    </div>
                    <div>
                    &nbsp
                    </div>
                    <div class="card">
                        <div class="card-header"><p><strong>Información de entrega: </strong></p></div>
                        <div class="card-body">
                            
                        <p> Dirección: {{ $usuario->Direccion_envio }} </p>
                        <p> A nombre de: {{ $usuario->Nombre }} {{ $usuario->Apellidos }}</p>
                        <p> Con DNI/NIF: {{ $usuario->DNI_NIF }} </p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div>
        &nbsp
        </div>
</div>
    @endif
  @endforeach
</div>

        

                
<div>
&nbsp
</div>
<p><strong>Pagados:</strong></p>
<div class="row">
@foreach(array_reverse($orders) as $ord)
@if($ord->Pagado == true)

    <div class="col col-lg-6">
            <div class="card">
                <div class="card-header bg-light mb-3">
                    <p>
                        <strong>Fecha: </strong> {{ $ord->Fecha }} 
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <strong>Pagado: </strong><?php if($ord->Pagado){echo "Sí";}else{echo "No";}?>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        
                        <strong>Entregado: </strong><?php if($ord->Entregado){echo "Sí";}else{echo "No";}?>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <strong>Total: </strong>{{ sprintf('%.2f',$ord->Precio_total) }}€
                    </p>
                </div>
                <div class="card-body text-center">
                <button type="button" class="btn btn-light" data-toggle="collapse" href="#collapse{{ $ord->id }}">Ver Detalles</button>
                    <div id="collapse{{ $ord->id }}" class="collapse">
                        <div>
                        &nbsp
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Línea</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Desc.</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $datos = \DB::select('SELECT * FROM order_product WHERE order_id ='. $ord->id) ?>
                                        @foreach($datos as $prod)
                                    <tr>
                                        @if($prod->product_id != null)
                                        <?php $p = App\Models\Product::findOrFail($prod->product_id) ?>
                                        <th scope="row">{{ $prod->Linea }}</th>
                                        <td>{{ $p->Nombre }}</td>
                                        <td>{{ $prod->Cantidad }}</td>
                                        <td>{{ sprintf('%.2f',$p->Precio_individual) }}€</td>
                                        <td>{{ sprintf('%.2f',$prod->Descuento) }}€</td>
                                        <td>{{ sprintf('%.2f',$prod->Precio * $prod->Cantidad - $prod->Descuento) }}€</td>
                                        @else
                                        <th scope="row">{{ $prod->Linea }}</th>
                                        <td>NULL</td>
                                        <td>{{ $prod->Cantidad }}</td>
                                        <td>NULL</td>
                                        <td>{{ sprintf('%.2f',$prod->Descuento) }}€</td>
                                        <td>{{ sprintf('%.2f',$prod->Precio * $prod->Cantidad - $prod->Descuento) }}€</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <?php $p = App\Models\Product::findOrFail($prod->product_id) ?>
                                        <th scope="row">Total</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><strong>{{ sprintf('%.2f',$ord->Precio_total) }}€</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                                @if(!$ord->Pagado)
                                <p class="text-danger text-left">El pedido no será procesado hasta que no se realice el pago.</p>
                                <button type="button" class="btn btn-outline-primary" href="#collapse{{ $ord->id }}">Pagar ahora</button>
                                @endif
                            </div>
                        </div>
                        <div>
                        &nbsp
                        </div>
                        <div class="card">
                            <div class="card-header"><p><strong>Información de entrega: </strong></p></div>
                            <div class="card-body">
                                
                            <p> Dirección: {{ $usuario->Direccion_envio }} </p>
                            <p> A nombre de: {{ $usuario->Nombre }} {{ $usuario->Apellidos }}</p>
                            <p> Con DNI/NIF: {{ $usuario->DNI_NIF }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div>
            &nbsp
            </div>
    </div>
    @endif
  @endforeach
  <p>NOTA: El precio por unidad de producto puede variar, pero usted pagará el precio del producto en el momento de la confirmación del pedido.</p>
            <div>
            &nbsp
            </div>
</div> <!-- container //  -->
@endsection