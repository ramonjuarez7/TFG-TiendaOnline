@extends('layouts.master')

@section('title', 'Butore Store - Pedidos')


@section('content')
<section class="section-content">
<div class="container">
<header class="section-heading">
    <h3 class="section-title">Finalizar compra</h3>      
</header><!-- sect-heading -->
            <p><strong>Contenido del pedido:</strong></p>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Descuento</th>
                        <th scope="col">Precio ud.</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                        <?php $prod = \App\Models\Product::findOrFail($item->id) ?>
                        <tr>
                        <th scope="row">1</th>
                        <td>{{ $prod->Nombre }}</td>
                        <td>{{ sprintf('%.2f',$item->Descuento) }}€</td>
                        <td>{{ sprintf('%.2f',$prod->Precio_individual) }}€</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ sprintf('%.2f',$item->total - $item->Descuento) }}€</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

        <div>&nbsp</div>

        <?php 
            $email = \Auth::user()->Email;
            $usuario = \App\Models\User::where('Email',$email)->firstOrFail();
        ?>

        <div class="row">
            <div class="col-2 col-lg-6">
                <div class="card">
                        <div class="card-header">
                            <p><strong>Información de entrega:</strong></p>
                        </div>
                        <div class="card-body">
                            <p>A nombre de: {{ $usuario->Nombre }} {{ $usuario->Apellidos }}</p>
                            <p>Dirección: {{ $usuario->Direccion_envio }}</p>
                            <p>Teléfono de contacto: {{ $usuario->Telefono }}</p>
                        </div>
                    </div>
                </div>
            <div class="col-2 col-lg-6">

            </div>
        </div>

        <div>&nbsp</div>           

        <div class="row">
            <div class="col-2 col-lg-10"></div>
            <div class="col-2 col-lg-2">
                <a href="/Pedidos/Finalizar/Confirmar" class="btn btn-primary">    
                    <strong>Confirmar pedido</strong>
                </a>
            </div>
        </div>

        <div>&nbsp</div>

</div>
</section>
@endsection