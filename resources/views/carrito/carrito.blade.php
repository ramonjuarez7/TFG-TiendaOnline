@extends('layouts.master')

@section('title', 'Butore Store')

@section('content')
    @if($mensaje ?? '')
    <div class="alert alert-danger" role="alert">
        {{ $mensaje }}
    </div>
    @endif
<div class="container">

    <h1 style="text-align:center;" class="display-4">Tu cesta</h1>
    <!-- -------------- -->
    <div class='row'>
        <div class='col-4 col-lg-3 col-md-4 col-sm-5'>
            Artículo
        </div>
        <div class='col-2 col-lg-4 col-md-6 col-sm-5'>
        </div>
        <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
            Precio
        </div>
        <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
            Cupones
        </div>
        <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
            Desc/Cupon
        </div>
        <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
            Desc. Total
        </div>
        <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
            Total
        </div>

    </div>

    <div class='row'>

        <div class='col-4 col-lg-12 col-md-4 col-sm-5'>
            <hr style="border-top: 2px solid blue"></hr>
        </div>
    </div>  
    
    <!-- -------------- -->
    @guest
            <?php
                    $sumatotal = 0;
                    foreach($cart as $item){
                        $p = 0;
                        $temp = "";
                        $temp = $temp . $item->id;
                        $id = array_search($temp, $productos);
                        $producto = $productos[$id-1];          
                        $sumatotal += $item->total;
                        echo" 
                        <div class='row'>
                            <div class='col-4 col-lg-3 col-md-4 col-sm-5'>
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
                                <p> " . sprintf('%.2f',$item->price) . "€ </p>
                            </div>
                            <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
                                <p> " . 0 . " </p>
                            </div>
                            <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
                                <p> " . 0 . " </p>
                            </div>
                            <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
                                <p> " . sprintf('%.2f',0) . "€ </p>
                            </div>
                            <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
                                <p><strong>" . sprintf('%.2f',$item->total) . "€</strong> </p>
                            </div>
                        </div>
                        ";
                        echo"

                <div class='row'>

                    <div class='col-4 col-lg-12 col-md-4 col-sm-5'>
                        <hr style='border-top: 2px solid blue'></hr>
                    </div>

                </div>"
                ;
                    }
                echo"

                <div class='row'>
                    <div class='col col-lg-10 '>
                    </div>
                    <div class='col-auto'>
                        Precio total: <strong>" . sprintf('%.2f',$sumatotal) . " €</strong> 
                    </div>
                </div>"
                ;

                

            ?>

        @if(\ShoppingCart::countRows() > 0)
                <div class="row mt-4">
                <div class="col-2">
                        <a href="/Carrito/Eliminar" class="btn btn-danger">    
                            <strong>Borrar carrito</strong>
                        </a>
                    </div>
                    <div class='col-2 col-lg-8 col-md-1 col-sm-1'>
                        
                    </div>
                    <div class="col-2">
                        <a href="/Login" class="btn btn-primary">    
                            <strong>Finalizar compra</strong>
                        </a>
                    </div>
                </div>
        
        </div>
        @endif
            <div>
            &nbsp
            </div>
        </div>
    @else
        <?php
                $sumatotal = 0;
                $email = \Auth::user()->Email;
                $usuario = \App\Models\User::where('Email',$email)->firstOrFail();
                $usercup = \DB::select('SELECT * FROM coupon_user WHERE user_id ='.$usuario->id);
                $products = \App\Models\Product::All();
                $cup = \App\Models\Coupon::All();
                foreach($cart as $item){
                    $descuento = 0;
                    $valor = 0;
                    foreach($usercup as $uc){ 
                        foreach($cup as $c){
                            if($c->id == $uc->coupon_id){
                                foreach($products as $p){
                                    if($c->product_id == $item->id){
                                        $descuento = $uc->Cantidad;
                                        $valor = $c->Descuento;
                                    } 
                                }
                            } 
                            
                        }
                    }
                    $temp = "";
                    $temp = $temp . $item->id;
                    $id = array_search($temp, $productos);
                    $producto = $productos[$id-1];          
                    if($descuento > $item->qty){
                        $cantidad = $item->qty;
                    } else {
                        $cantidad = $descuento;
                    }
                    //$descuentostotales[$item->id] = $cantidad * $valor;
                    $sumatotal += $item->total - $cantidad * $valor;
                    echo" 
                    <div class='row'>
                        <div class='col-4 col-lg-3 col-md-4 col-sm-5'>
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
                            <p> " . sprintf('%.2f',$item->price) . "€ </p>
                        </div>
                        <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
                            <p> " . $cantidad . " </p>
                        </div>
                        <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
                            <p> " . sprintf('%.2f',$valor) . "€ </p>
                        </div>
                        <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
                            <p> " . sprintf('%.2f',$valor * $cantidad) . "€ </p>
                        </div>
                        <div class='col-2 col-lg-1 col-md-1 col-sm-1'>
                            <p><strong>" . sprintf('%.2f',$item->total - $valor * $cantidad) . "€</strong> </p>
                        </div>
                    </div>
                    ";
                    echo"

            <div class='row'>

                <div class='col-4 col-lg-12 col-md-4 col-sm-5'>
                    <hr style='border-top: 2px solid blue'></hr>
                </div>

            </div>"
            ;
                }
            echo"

            <div class='row'>
                <div class='col col-lg-10 '>
                </div>
                <div class='col-auto'>
                    Precio total: <strong>" . sprintf('%.2f',$sumatotal) . " €</strong> 
                </div>
            </div>"
            ;

            

        ?>

        @if(\ShoppingCart::countRows() > 0)
        <div class="row mt-4">
        <div class="col-2">
                <a href="/Carrito/Eliminar" class="btn btn-danger">    
                    <strong>Borrar carrito</strong>
                </a>
            </div>
            <div class='col-2 col-lg-8 col-md-1 col-sm-1'>
                
            </div>
            <div class="col-2">
                <a href="/Pedidos/Finalizar" class="btn btn-primary">    
                    <strong>Finalizar compra</strong>
                </a>
            </div>
        </div>
        
        </div>
        @endif
        <div>
        &nbsp
        </div>
    @endguest
        
@endsection