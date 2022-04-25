@extends('layouts.master')

@section('title', 'Butore Store - Perfil')


@section('content')
<div class="container">
    <header class="section-heading">
        <h3 class="section-title">Perfil: {{ $usuario->Nombre }} {{ $usuario->Apellidos }}</h3>
    </header>
    @if($errors->any())
    <p class="text-success">{{ $errors->first() }}</p>
    @endif
    <div class="col col-ln-2">
    <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
        @if($pest == "Cuenta")
      <li class="nav-item">
        <a class="nav-link active" href="">Mi cuenta</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Perfil/Datos">Mis datos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Perfil/Direcciones">Mis direcciones</a>
      </li>
      @elseif ($pest == "Datos")
      <li class="nav-item">
        <a class="nav-link" href="/Perfil/Cuenta">Mi cuenta</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="">Mis datos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Perfil/Direcciones">Mis direcciones</a>
      </li>
      @elseif ($pest == "Direcciones")
      <li class="nav-item">
        <a class="nav-link" href="/Perfil/Cuenta">Mi cuenta</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Perfil/Datos">Mis datos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="">Mis direcciones</a>
      </li>
      @endif
    </ul>
  </div>
  @if($pest == "Cuenta")
  <div class="card-body">
      <div class="card" >
        <h5 class="card-header">Credenciales</h5> 
                <div>
                <p class="text-left"><Strong>&nbsp Email de acceso: </strong> {{ $usuario->Email }}</p>
                </div>
                <div>
                <p class="text-left"><Strong>&nbsp Contraseña: </strong> ************ </p>
                </div>
      </div>
      <div>
      &nbsp
    </div>
      <a class="btn btn-outline-primary" href="/Perfil/Cuenta/Modificar/Email" role="button"><strong>Modificar Email</strong></a>
      &nbsp
      <a class="btn btn-outline-primary" href="/Perfil/Cuenta/Modificar/Password" role="button"><strong>Modificar Contraseña</strong></a>
      &nbsp
      <a class="btn btn-outline-danger" href="#" role="button"><strong>Borrar cuenta</strong></a>

      
  </div>
  @elseif ($pest == "Datos")
  <div class="card-body">
      <div class="card" >
        <h5 class="card-header">Datos Personales</h5> 
                <div>
                <p class="text-left"><Strong>&nbsp Nombre y Apellidos: </strong> {{ $usuario->Nombre }} {{ $usuario->Apellidos }}</p>
                </div>
                <div>
                <p class="text-left"><Strong>&nbsp Documento de identidad: </strong> {{ $usuario->DNI_NIF}} </p>
                </div>
                <div>
                <p class="text-left"><Strong>&nbsp Fecha de nacimiento: </strong> {{ $usuario->Nacimiento}} </p>
                </div>
                <div>
                <p class="text-left"><Strong>&nbsp Teléfono de contacto: </strong> {{ $usuario->Telefono}} </p>
                </div>
      </div>
      <div>
      &nbsp
    </div>
      <a class="btn btn-outline-primary" href="/Perfil/Datos/Modificar/Telefono" role="button"><strong>Modificar Teléfono</strong></a>
      <div>
      &nbsp
    </div>
      <div>
      <p class="text-left">*Si encuentra algún error en los datos personales póngase en contacto con nosotros.</p>
    </div>

  </div>
  @elseif ($pest == "Direcciones")
  <div class="card-body">
  <div class="card" >
        <h5 class="card-header">Datos Personales</h5> 
                <div>
                <p class="text-left"><Strong>&nbsp Dirección de envío: </strong> {{ $usuario->Direccion_envio }}</p>
                </div>
                <div>
                <p class="text-left"><Strong>&nbsp Dirección de facturación: </strong> {{ $usuario->Direccion_facturacion}} </p>
                </div>
    </div>
      <div>
      &nbsp
        </div>
      <a class="btn btn-outline-primary" href="/Perfil/Direcciones/Modificar/Envio" role="button"><strong>Modificar Dir. Envío</strong></a>
      &nbsp
      <a class="btn btn-outline-primary" href="/Perfil/Direcciones/Modificar/Facturacion" role="button"><strong>Modificar Dr. Facturación</strong></a>
</div>
  @endif
</div>
    </div>
</div>
<div>
&nbsp
</div>
                
@endsection