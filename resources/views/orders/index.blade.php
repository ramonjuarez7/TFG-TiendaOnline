@extends('layouts.master')

@section('title', 'Butore Store - Pedidos')


@section('content')

<div class="container">
<header class="section-heading">
  <h3 class="section-title">Pedidos</h3>
</header>

<div class="row">
@foreach($orders as $ord)
<div class="col col-lg-6">
        <div class="card">
            <div class="card-header bg-light mb-3">
                <p>
                    <strong>Fecha: </strong> {{ $ord->Fecha }} 
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <strong>Pagado: </strong><?php if($ord->Pagado){echo "Sí";}else{echo "No";}?>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    
                    <strong>Entregado: </strong><?php if($ord->Entregado){echo "Sí";}else{echo "No";}?>
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
                                    <?php $p = App\Models\Product::findOrFail($prod->product_id) ?>
                                    <th scope="row">{{ $prod->Linea }}</th>
                                    <td>{{ $p->Nombre }}</td>
                                    <td>{{ $prod->Cantidad }}</td>
                                    <td>{{ $p->Precio_individual }}€</td>
                                    <td>{{ $prod->Descuento }}€</td>
                                    <td>{{ $prod->Precio }}€</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <?php $p = App\Models\Product::findOrFail($prod->product_id) ?>
                                    <th scope="row">Total</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>{{ $ord->Precio_total }}€</strong></td>
                                </tr>
                                </tbody>
                            </table>
                            @if(!$ord->Pagado)
                            <p class="text-danger text-left">El pedido no será procesado hasta que no se realice el pago.</p>
                            <button type="button" class="btn btn-light" href="#collapse{{ $ord->id }}">Pagar ahora</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div>
        &nbsp
        </div>
</div>
    
  @endforeach
</div>

        

                
                <div>
                &nbsp
                </div>

</div> <!-- container //  -->
@endsection