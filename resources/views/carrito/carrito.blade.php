@extends('layouts.master')

@section('title', 'Butore Store')

@section('content')
    @if($mensaje ?? '')
    <div class="alert alert-danger" role="alert">
        {{ $mensaje }}
    </div>
    @endif

    <h1 style="text-align:center;" class="display-4">Tu cesta</h1>
    <!-- -------------- -->
    <div class='row'>
        <div class='col-2 col-lg-2 col-md-4 col-sm-5'>
        </div>
        <div class='col-4 col-lg-3 col-md-4 col-sm-5'>
            Cesta
        </div>
        <div class='col-2 col-lg-3 col-md-6 col-sm-5'>
        </div>
        <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
            Precio
        </div>
        <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
            Total
        </div>
        <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
            
        </div>
    </div>

    <div class='row'>
        <div class='col-2 col-lg-2 col-md-4 col-sm-5'>
        </div>
        <div class='col-4 col-lg-8 col-md-4 col-sm-5'>
            <hr style="border-top: 2px solid blue"></hr>
        </div>
        <div class='col-2 col-lg-2 col-md-4 col-sm-5'>
        </div>
    </div>  
    
    <!-- -------------- -->
        <?php
            $sumatotal = 0;
            foreach($cart as $item){
                $temp = "";
                $temp = $temp . $item->id;
                $id = array_search($temp, $productos);
                $producto = $productos[$id-1];
                $sumatotal += $item->total;
                echo" 
                <div class='row'>
                <div class='col-2 col-lg-2 col-md-4 col-sm-5'>
                </div>
                    <div class='col-4 col-lg-2 col-md-4 col-sm-5'>
                        <img style='height:200px;max-width:100%;' src=\"$producto->Imagen\" alt='" . $producto->Nombre . "'>
                    </div>
                    <div class='col col-lg-4 col-md-6 col-sm-5'>
                        <p style='font-size:30px'><a href='" . url('/Producto/' . $item->id) ." '><strong>" . $item->name . "</strong></a>
                        </p>
                        <p>" . $producto->Informacion . "</p> 
                        <p> Cantidad: <strong>" . $item->qty . "</strong></p> 
                        <p>
                            <div class='btn-group' role='group'>";
                                if($producto->Maximo_pedido > $item->qty){
                                    echo "<a style='width:60px' class=\"btn btn-outline-success\" href=\"". url('Carrito/Add/'. $item->rawId()) ."\"> <strong>+</strong></a>";
                                }
                                echo "<a style='width:60px' class=\"btn btn-outline-danger ml-1\" href=\"". url('/Carrito/Delete/'. $item->rawId()) ."\"> <strong>-</strong></a>
                            </div>
                        </p>
                    </div>
                    <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
                        <p> " . $item->price . "€ </p>
                    </div>
                    <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
                        <p><strong>" . $item->total . "€</strong> </p>
                    </div>
                </div>
                ";
                echo"

        <div class='row'>
            <div class='col-2 col-lg-2 col-md-4 col-sm-5'>
            </div>
            <div class='col-4 col-lg-8 col-md-4 col-sm-5'>
                <hr style='border-top: 2px solid blue'></hr>
            </div>
            <div class='col-2 col-lg-2 col-md-4 col-sm-5'>
            </div>
        </div>"
        ;
            }
        echo"

        <div class='row'>
            <div class='col col-lg-9 '>
            </div>
            <div class='col-auto'>
                Precio total: <strong>" . $sumatotal . " €</strong> 
            </div>
        </div>"
        ;

        

    ?>

    <div class="row mt-4">
        <div class='col-2 col-lg-9 col-md-1 col-sm-1'>
            
        </div>
        <div class="col-2">
            <a href="{{ action('CarritoController@finish') }}" class="btn btn-primary">    
                <strong>Finalizar compra</strong>
            </a>
        </div>
    </div>
    <div>
    &nbsp
    </div>
@endsection