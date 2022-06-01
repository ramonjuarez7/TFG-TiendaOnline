@extends('layouts.master')

@section('title', 'Butore Store - Administración')


@section('content')

@guest
<div class="container">
Error 403 Forbidden.
</div>
<div>
&nbsp
</div>
@else
    <?php $email = \Auth::user()->Email;
          $usuario = \App\Models\User::where('Email',$email)->firstOrFail(); 
    ?>
  @if($usuario->Privilegios == true)
<div class="container">
<header class="section-heading">
    <h3 class="section-title">Panel de Administración</h3>  
    <p> Pulsa en en el Id del elemento para ver más detalles o modificar.</p>    
</header><!-- sect-heading -->

<div class="col col-ln-2">
    <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
        @if($pest == "Productos")
      <li class="nav-item">
        <a class="nav-link active" href="">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Usuarios">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Categorias">Categorías</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Subcategorias">Subcategorías</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Cupones">Cupones</a>
      </li>
      @elseif ($pest == "Usuarios")
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Productos">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="/Administracion/Usuarios">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Categorias">Categorías</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Subcategorias">Subcategorías</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Cupones">Cupones</a>
      </li>
      @elseif ($pest == "Categorias")
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Productos">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Usuarios">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="">Categorías</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Subcategorias">Subcategorías</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Cupones">Cupones</a>
      </li>
      @elseif ($pest == "Subcategorias")
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Productos">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Usuarios">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Categorias">Categorías</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="">Subcategorías</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Cupones">Cupones</a>
      </li>
      @elseif ($pest == "Cupones")
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Productos">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Usuarios">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Categorias">Categorías</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Administracion/Subcategorias">Subcategorías</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="">Cupones</a>
      </li>
      @endif
    </ul>
  </div>
  @if($pest == "Categorias")
  <div class="card-body">
      <div class="card" >
        <h5 class="card-header">Administración de Categorías</h5> 
        <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Id') }}">Id</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Nombre') }}">Nombre</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($modelo as $mod)
                    <tr>
                    <th scope="row"><a href="{{ url('Administracion/'.$pest.'/Elemento/'.$mod->id) }}">{{ $mod->id }}</a></th>
                    <td>{{ $mod->Nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
           
        </table>
        <div>
      &nbsp
    </div>
      <a class="btn btn-outline-primary" href="/Perfil/Cuenta/Modificar/Email" role="button"><strong>Añadir Categoría</strong></a>
      &nbsp
      </div>



      
  </div>
  @elseif ($pest == "Subcategorias")
  <div class="card-body">
      <div class="card" >
        <h5 class="card-header">Administración de Subcategorías</h5> 
        <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Id') }}">Id</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Nombre') }}">Nombre</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/supercategory_id') }}">Pertenece a</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($modelo as $mod)
                    <tr>
                    <th scope="row"><a href="{{ url('Administracion/'.$pest.'/Elemento/'.$mod->id) }}">{{ $mod->id }}</a></th>
                    <td>{{ $mod->Nombre }}</td>
                    @if($mod->supercategory_id != null)
                    <td><?php $cat = \App\Models\Supercategory::findOrFail($mod->supercategory_id); echo $cat->id.' - '.$cat->Nombre; ?></td>
                    @else
                    <td>NULL</td>
                    @endif
                    </tr>
                @endforeach
            </tbody>
           
        </table>
        <div>
      &nbsp
    </div>
      <a class="btn btn-outline-primary" href="/Perfil/Cuenta/Modificar/Password" role="button"><strong>Añadir Subcategoría</strong></a>
      </div>



      
  </div>
  @elseif ($pest == "Usuarios")
  <div class="card-body">
      <div class="card" >
        <h5 class="card-header">Administración de Usuarios</h5> 
        <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Id') }}">Id</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Email') }}">Correo electrónico</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Nombre') }}">Nombre</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Apellidos') }}">Apellidos</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Estado') }}">Estado</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Privilegios') }}">Privilegios</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Telefono') }}">Teléfono</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($modelo as $mod)
                    <tr>
                    <th scope="row"><a href="{{ url('Administracion/'.$pest.'/Elemento/'.$mod->id) }}">{{ $mod->id }}</a></th>
                    <td>{{ $mod->Email }}</td>
                    <td>{{ $mod->Nombre }}</td>
                    <td>{{ $mod->Apellidos }}</td>
                    <td><?php if($mod->Estado){ echo "Normal"; }else{ echo "Baneado"; } ?></td>
                    <td><?php if($mod->Privilegios){ echo "Administrador"; }else{ echo "Normal"; } ?></td>
                    <td>{{ $mod->Telefono }}</td>
                    </tr>
                @endforeach
            </tbody>
           
        </table>
        <div>
        &nbsp
        </div>
          <a class="btn btn-outline-primary" href="/Perfil/Direcciones/Modificar/Envio" role="button"><strong>Añadir Producto</strong></a>
        </div>
        
    </div>

  </div>
  @elseif ($pest == "Productos")
  <div class="card-body">
  <div class="card" >
        <h5 class="card-header">Administración de Productos</h5> 
        <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Id') }}">Id</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Nombre') }}">Nombre</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Codigo_barras') }}">Código de barras</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Stock') }}">Stock</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/concretecategory_id') }}">Subcategoría</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Novedad') }}">Novedad</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Precio_individual') }}">Precio</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($modelo as $mod)
                    <tr>
                    <th scope="row"><a href="{{ url('Administracion/'.$pest.'/Elemento/'.$mod->id) }}">{{ $mod->id }}</a></th>
                    <td>{{ $mod->Nombre }}</td>
                    <td>{{ $mod->Codigo_barras }}</td>
                    <td>{{ $mod->Stock }}</td>
                    <td>
                    <?php 
                    if($mod->concretecategory_id != null){
                      $sc = \App\Models\Concretecategory::findOrFail($mod->concretecategory_id); 
                      if($sc->supercategory_id != null){
                        echo $sc->supercategory_id." - ".$sc->Nombre; 
                      } else {
                        echo $sc->Nombre;
                      }
                    } else {
                      echo "No tiene categoría";
                    }
                      
                    ?>
                    </td>
                    <td><?php if($mod->Novedad){ echo "Sí"; } else { echo "No"; } ?></td>
                    <td>{{ sprintf('%.2f',$mod->Precio_individual) }}€</td>
                    </tr>
                @endforeach
            </tbody>
           
        </table>
        </div>
    </div>
      <div>
      &nbsp
        </div>
      <a class="btn btn-outline-primary" href="/Perfil/Direcciones/Modificar/Envio" role="button"><strong>Añadir Producto</strong></a>
</div>
@elseif ($pest == "Cupones")
  <div class="card-body">
  <div class="card" >
        <h5 class="card-header">Administración de Cupones</h5> 
        <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Id') }}">Id</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/product_id') }}">Producto</a></th>
                <th scope="col"><a href="{{ url('Administracion/'.$pest.'/Descuento') }}">Descuento</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($modelo as $mod)
                    <tr>
                    <th scope="row"><a href="{{ url('Administracion/'.$pest.'/Elemento/'.$mod->id) }}">{{ $mod->id }}</a></th>
                    <td><?php $prd = \App\Models\Product::findOrFail($mod->product_id); echo $prd->id.' - '.$prd->Nombre; ?></td>
                    <td>{{ sprintf('%.2f',$mod->Descuento) }}€</td>
                    </tr>
                @endforeach
            </tbody>
           
        </table>
        </div>
    </div>
      <div>
      &nbsp
        </div>
      <a class="btn btn-outline-primary" href="/Perfil/Direcciones/Modificar/Envio" role="button"><strong>Añadir Cupón</strong></a>
</div>
  @endif
</div>
    </div>
</div>
<div>
&nbsp
</div>

@else
<div class="container">
Error 403 Forbidden.
</div>
<div>
&nbsp
</div>
@endif
@endguest

@endsection
