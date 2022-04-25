@extends('layouts.master')

@section('title', 'Butore Store - Perfil')


@section('content')
<div class="container">
<header class="section-heading">
    @switch($target)
        @case("Envio")
            <h3 class="section-title">Modificar Dirección de envío</h3>
            @break
        @case("Facturacion")
            <h3 class="section-title">Modificar Dirección de facturación</h3>
            @break
        @case("Password")
            <h3 class="section-title">Modificar Contraseña</h3>
            @break
        @case("Telefono")
            <h3 class="section-title">Modificar Teléfono</h3>
            @break
        @case("Email")
            <h3 class="section-title">Modificar Email</h3>
            @break
        @endswitch
</header>
<form method='POST'>
        @csrf
        <div class="row">
            <div class="col-sm col-lg-4">
            @switch($target)
                @case("Telefono")
                    <div class="form-group">
                        <label for="stock"><strong>Nuevo Teléfono</strong></label>
                        <input type="text" maxlength="9" name="tar" id="tar" class='form-control' placeholder='{{ $usuario->Telefono }}' required>
                    </div>
                    <div class="form-group">
                    <label for="minStock"><strong>Contraseña</strong></label>
                    <input type="password" maxlength="20" name="passwd" id="passwd" class='form-control' placeholder='****' required>
                </div>
                    @break
                @case("Facturacion")
                <div class="form-group">
                    <label for="stock"><strong>Nueva Dirección de facturación</strong></label>
                    <input type="text" name="tar" id="tar" class='form-control' placeholder='{{ $usuario->Direccion_facturacion }}' required>
                </div>  
                <div class="form-group">
                    <label for="minStock"><strong>Contraseña</strong></label>
                    <input type="password" maxlength="20" name="passwd" id="passwd" class='form-control' placeholder='****' required>
                </div>
                    @break
                @case("Password")
                    <div class="form-group">
                        <label for="minStock"><strong>Antigua Contraseña</strong></label>
                        <input type="password" maxlength="20" name="passwd" id="passwd" class='form-control' placeholder='****' required>
                    </div>
                    <div class="form-group">
                        <label for="minStock"><strong>Nueva Contraseña</strong></label>
                        <input type="password" maxlength="20" name="tar" id="tar" class='form-control' placeholder='****' required>
                    </div>
                    <div class="form-group">
                        <label for="minStock"><strong>Repetir Nueva Contraseña</strong></label>
                        <input type="password" maxlength="20" name="tar_confirmation" id="tar_confirmation" class='form-control' placeholder='****' required>
                    </div>
                    @break
                @case("Envio")
                <div class="form-group">
                    <label for="stock"><strong>Nueva Dirección de envío</strong></label>
                    <input type="text" maxlength="50" name="tar" id="tar" class='form-control' placeholder='{{ $usuario->Direccion_envio }}' required>
                </div>
                <div class="form-group">
                    <label for="minStock"><strong>Contraseña</strong></label>
                    <input type="password" maxlength="20" name="passwd" id="passwd" class='form-control' placeholder='****' required>
                </div>
                    @break
                @case("Email")
                <div class="form-group">
                    <label for="stock"><strong>Nuevo Email</strong></label>
                    <input type="text" maxlength="50" name="tar" id="tar" class='form-control' placeholder='{{ $usuario->Email }}' required>
                </div><div class="form-group">
                    <label for="minStock"><strong>Contraseña</strong></label>
                    <input type="password" maxlength="20" name="passwd" id="passwd" class='form-control' placeholder='****' required>
                </div>
                    @break
                @endswitch
                
                @if($errors->any())
                <p class="text-danger">{{ $errors->first() }}</p>
                @endif
                
                <div>
                &nbsp
                </div>
                <div class="row">
                    <div class="col col-lg-9">
                    </div>
                    <div class="col col-lg-2">
                        <button type="submit" class="btn btn-primary">Modificar</button>
                    </div>
                </div>
                <div>
                &nbsp
                </div>
            </div>
        </div>
    </form>
</div>
                
@endsection