@extends('layouts.master')

@section('title', 'Butore Store - Pago')


@section('content')
<div class="container">
    <header class="section-heading">
        <h3 class="section-title">*Simluador de pasarela de pago*</h3>
    </header>
    <a type="button" class="btn btn-primary" href="{{ action('OrderController@pagado',$order->id) }}">Pagar</a>
    <div>
    &nbsp
    </div>  

</div>
                
@endsection