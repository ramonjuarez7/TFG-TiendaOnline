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
        <p> Información de elemento.</p>    
    </header><!-- sect-heading -->

    @if($pest == "Productos")
    <div class="row">
    <div class="col col-lg-6">
    <div class="card" >
        <h5 class="card-header">Modificar</h5> 
        <div class="card-body">
            <?php $e = \App\Models\Product::findOrFail($element); ?>
            <p>Dejar en blanco para conservar valor.</p>
            <form method='POST'>
            @csrf
                <div class="form-group">
                    <label for="stock"><strong>Nombre:</strong></label>
                    <input type="text" maxlength="50" name="tar1" id="tar1" class='form-control' placeholder='{{ $e->Nombre }}'>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Información:</strong></label>
                    <input type="text" maxlength="50" name="tar2" id="tar2" class='form-control' placeholder='{{ $e->Informacion }}'>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Peso/Volumen:</strong></label>
                    <input type="text" maxlength="50" name="tar3" id="tar3" class='form-control' placeholder='{{ $e->Peso_volumen }}'>
                </div>
                <label for="stock"><strong>Medicion:</strong></label>
                @if(!$e->Medicion)
                <div class="form-check">
                <input class="form-check-input" type="radio" name="medicion" id="radios1" value="option1" checked>
                <label class="form-check-label" for="radios1">
                    L
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="medicion" id="radios2" value="option2">
                <label class="form-check-label" for="radios2">
                    Kg
                </label>
                </div>
                @else
                <div class="form-check">
                <input class="form-check-input" type="radio" name="medicion" id="radios1" value="option1">
                <label class="form-check-label" for="radios1">
                    L
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="medicion" id="radios2" value="option2" checked>
                <label class="form-check-label" for="radios2">
                    Kg
                </label>
                </div>
                @endif
                <div>&nbsp</div>
                <div class="form-group">
                    <label for="stock"><strong>Precio Individual (€):</strong></label>
                    <input type="text" maxlength="50" name="tar4" id="tar4" class='form-control' placeholder='{{ sprintf('%.2f',$e->Precio_individual) }}'>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Precio por Peso/Volumen (€):</strong></label>
                    <input type="text" maxlength="50" name="tar5" id="tar5" class='form-control' placeholder='{{ sprintf('%.2f',$e->Precio_peso_volumen) }}'>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Stock:</strong></label>
                    <input type="text" maxlength="50" name="tar6" id="tar6" class='form-control' placeholder='{{ $e->Stock }}'>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Maximo por pedido:</strong></label>
                    <input type="text" maxlength="50" name="tar7" id="tar7" class='form-control' placeholder='{{ $e->Maximo_pedido }}'>
                </div>
                <label for="stock"><strong>Novedad:</strong></label>
                @if($e->Novedad)
                <div class="form-check">
                <input class="form-check-input" type="radio" name="novedad" id="radios3" value="option3" checked>
                <label class="form-check-label" for="radios3">
                    Sí
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="novedad" id="radios4" value="option4">
                <label class="form-check-label" for="radios4">
                    No
                </label>
                </div>
                @else
                <div class="form-check">
                <input class="form-check-input" type="radio" name="novedad" id="radios3" value="option3">
                <label class="form-check-label" for="radios3">
                    Sí
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="novedad" id="radios4" value="option4" checked>
                <label class="form-check-label" for="radios4">
                    No
                </label>
                </div>
                @endif
                <div>&nbsp</div>
                <label for="stock"><strong>Categoría:</strong></label>
                <select class="custom-select custom-select-lg-1" aria-label="Default select example" id="cat" name="cat">
                    <option value="0" selected>Seleccione una categoría...</option>
                    @foreach ($concretecategories as $key2)
                        <option value="{{ $key2->id }}">
                        <?php 
                            if($key2->supercategory_id != null){
                                $sc = \App\Models\Supercategory::findOrFail($key2->supercategory_id);
                                echo $key2->Nombre;
                                echo ' ('.$sc->Nombre.')';
                            } else {
                                echo $key2->Nombre;
                            }                 
                        ?>
                        </option>
                    @endforeach 
                </select>
                </div>
                <div class="row">
                <div class="col col-lg-1"></div>
                <div class="col col-lg-6">
                    <a href="{{ url('Administracion/Productos/Elemento/Borrar/'.$element) }}" class="btn btn-danger">    
                                    <strong>Borrar Elemento</strong>
                                </a>
                </div>
                <button type="submit" class="btn btn-success"><strong>Confirmar cambios</strong></button>   
                                    
                </div>
                <div>&nbsp</div>
            </form>
    </div>
    </div>
    <div class="col col-lg-6">
    <div class="card" >
        <h5 class="card-header">Información del producto: {{ $element }}</h5> 
        <div class="card-body">
            <?php $e = \App\Models\Product::findOrFail($element); ?>
        @if($errors->any())
            <p class="text-success">{{ $errors->first() }}</p>
        @endif
        <p><strong>Nombre:</strong> {{ $e->Nombre }}</p>
        <p><strong>Informacion:</strong> {{ $e->Informacion }}</p>
        <p><strong>Peso/Volumen:</strong> <?php echo $e->Peso_volumen; if($e->Medicion){ echo "Kg"; }else{ echo "L";} ?></p>
        <p><strong>Precio Individual:</strong> {{ sprintf('%.2f',$e->Precio_individual) }}€</p>
        <p><strong>Precio por Peso/Volumen:</strong> {{ sprintf('%.2f',$e->Precio_peso_volumen) }}€</p>
        <p><strong>Código de Barras:</strong> {{ $e->Codigo_barras }}</p>
        <p><strong>Stock:</strong> {{ $e->Stock }}</p>
        <p><strong>Máximo por pedido:</strong> {{ $e->Maximo_pedido }}</p>
        <p><strong>Novedad:</strong> <?php if($e->Novedad){ echo "Sí"; }else{ echo "No";} ?></p>
        <p><strong>Categoría:</strong> 
            <?php 
            if($e->concretecategory_id){
                $cat = \App\Models\Concretecategory::findOrFail($e->concretecategory_id);
                if($cat->supercategory_id != null){
                    $sc = \App\Models\Supercategory::findOrFail($cat->supercategory_id);
                    echo $cat->Nombre;
                    echo ' ('.$sc->Nombre.')';
                } else {
                    echo $cat->Nombre;
                } 
            } else {
                echo "No tiene categoría, por favor asigne una.";
            }
            

            ?>
        </p>
        </div>
    </div>
    </div>
    
    </div>
    <div>
&nbsp
</div>
    @elseif ($pest == "Usuarios")
            <div class="row">
            <div class="col col-lg-6">
            <div class="card" >
                <h5 class="card-header">Modificar</h5> 
                <div class="card-body">
                    <?php $e = \App\Models\User::findOrFail($element); ?>
                    <p>Dejar en blanco para conservar valor.</p>
                    <form method='POST'>
                    @csrf
                        <div class="form-group">
                            <label for="stock"><strong>Nombre:</strong></label>
                            <input type="text" maxlength="50" name="tar1" id="tar1" class='form-control' placeholder='{{ $e->Nombre }}'>
                        </div>
                        <div class="form-group">
                            <label for="stock"><strong>Apellidos:</strong></label>
                            <input type="text" maxlength="50" name="tar2" id="tar2" class='form-control' placeholder='{{ $e->Apellidos }}'>
                        </div>
                        <div class="form-group">
                            <label for="stock"><strong>DNI/NIF (Modificar solo si es incorrecto):</strong></label>
                            <input type="text" maxlength="9" name="tar3" id="tar3" class='form-control' placeholder='{{ $e->DNI_NIF }}'>
                        </div>
                        <div class="form-group">
                            <label for="stock"><strong>Email:</strong></label>
                            <input type="text" maxlength="50" name="tar4" id="tar4" class='form-control' placeholder='{{ $e->Email }}'>
                        </div>
                        <div class="form-group">
                            <label for="stock"><strong>Fecha de Nacimiento (Modificar solo si es incorrecto):</strong></label>
                            <input type="text" maxlength="10" name="tar5" id="tar5" class='form-control' placeholder='{{ $e->Nacimiento }}'>
                        </div>
                        <div class="form-group">
                            <label for="stock"><strong>Teléfono:</strong></label>
                            <input type="text" maxlength="9" name="tar6" id="tar6" class='form-control' placeholder='{{ $e->Telefono }}'>
                        </div>
                        <div class="form-group">
                            <label for="stock"><strong>Dirección de envío:</strong></label>
                            <input type="text" maxlength="50" name="tar7" id="tar7" class='form-control' placeholder='{{ $e->Direccion_envio }}'>
                        </div>
                        <div class="form-group">
                            <label for="stock"><strong>Dirección de facturación:</strong></label>
                            <input type="text" maxlength="50" name="tar8" id="tar8" class='form-control' placeholder='{{ $e->Direccion_facturacion }}'>
                        </div>
                        <label for="stock"><strong>Estado:</strong></label>
                        @if($e->Estado)
                            @if($usuario->id == $element)
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="novedad" id="radios3" value="option3" checked disabled>
                                <label class="form-check-label" for="radios3">
                                    Normal
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="novedad" id="radios4" value="option4" disabled>
                                <label class="form-check-label" for="radios4">
                                    Baneado
                                </label>
                                </div>
                            @else
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="novedad" id="radios3" value="option3" checked>
                                <label class="form-check-label" for="radios3">
                                    Normal
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="novedad" id="radios4" value="option4">
                                <label class="form-check-label" for="radios4">
                                    Baneado
                                </label>
                                </div>
                            @endif
                        @else
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="novedad" id="radios3" value="option3">
                        <label class="form-check-label" for="radios3">
                            Normal
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="novedad" id="radios4" value="option4" checked>
                        <label class="form-check-label" for="radios4">
                            Baneado
                        </label>
                        </div>
                        @endif
                        <div>&nbsp</div>
                        <label for="stock"><strong>Privilegios:</strong></label>
                        @if($e->Privilegios)
                            @if($usuario->id == $element)
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="medicion" id="radios1" value="option1" checked disabled>
                                <label class="form-check-label" for="radios1">
                                    Administrador
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="medicion" id="radios2" value="option2" disabled>
                                <label class="form-check-label" for="radios2">
                                    Normal
                                </label>
                                </div>
                            @else
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="medicion" id="radios1" value="option1" checked disabled>
                                <label class="form-check-label" for="radios1">
                                    Administrador
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="medicion" id="radios2" value="option2" disabled>
                                <label class="form-check-label" for="radios2">
                                    Normal
                                </label>
                                </div>
                            @endif
                        @else
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="medicion" id="radios1" value="option1">
                        <label class="form-check-label" for="radios1">
                            Administrador
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="medicion" id="radios2" value="option2" checked>
                        <label class="form-check-label" for="radios2">
                            Normal
                        </label>
                        </div>
                        @endif
                        </div>
                        <div class="row">
                        <div class="col col-lg-1"></div>
                        <div class="col col-lg-6">
                            @if($usuario->id == $element)
                                <button href="{{ url('Administracion/Usuarios/Elemento/Borrar/'.$element) }}" class="btn btn-danger" disabled>    
                                    <strong>Borrar Elemento</strong>
                                </button>
                            @else
                                <a href="{{ url('Administracion/Usuarios/Elemento/Borrar/'.$element) }}" class="btn btn-danger">    
                                    <strong>Borrar Elemento</strong>
                                </a>
                            @endif
                            </div>
                        <button type="submit" class="btn btn-success"><strong>Confirmar cambios</strong></button>   
                                            
                        </div>
                        <div>&nbsp</div>
                    </form>
            </div>
            </div>
            <div class="col col-lg-6">
            <div class="card" >
                <h5 class="card-header">Información del usuario: {{ $element }}</h5> 
                <div class="card-body">
                    <?php $e = \App\Models\User::findOrFail($element); ?>
                @if($errors->any())
                    <p class="text-success">{{ $errors->first() }}</p>
                @endif
                <p><strong>Nombre:</strong> {{ $e->Nombre }}</p>
                <p><strong>Apellidos:</strong> {{ $e->Apellidos }}</p>
                <p><strong>DNI/NIF:</strong> {{ $e->DNI_NIF }} </p>
                <p><strong>Email:</strong> {{ $e->Email }}</p>
                <p><strong>Nacimiento:</strong> {{ $e->Nacimiento }}</p>
                <p><strong>Teléfono:</strong> {{ $e->Telefono }}</p>
                <p><strong>Dirección de envío:</strong> {{ $e->Direccion_envio }}</p>
                <p><strong>Dirección de envío:</strong> {{ $e->Direccion_facturacion }}</p>
                <p><strong>Registro:</strong> {{ $e->Registro }}</p>
                <p><strong>Estado:</strong> <?php if($e->Estado){ echo "Normal"; }else{ echo "Baneado";} ?></p>
                <p><strong>Privilegios:</strong> <?php if($e->Privilegios){ echo "Administrador"; }else{ echo "Normal";} ?></p>
                </div>
            </div>
            </div>
            
            </div>
            <div>
        &nbsp
        </div>
    @elseif ($pest == "Categorias")
        <div class="row">
        <div class="col col-lg-6">
        <div class="card" >
            <h5 class="card-header">Modificar</h5> 
            <div class="card-body">
                <?php $e = \App\Models\Supercategory::findOrFail($element); ?>
                <p>Dejar en blanco para conservar valor.</p>
                <form method='POST'>
                @csrf
                    <div class="form-group">
                        <label for="stock"><strong>Nombre:</strong></label>
                        <input type="text" maxlength="50" name="tar1" id="tar1" class='form-control' placeholder='{{ $e->Nombre }}'>
                    </div>
                    <div class="row">
                    <div class="col col-lg-1"></div>
                    <div class="col col-lg-6">
                        <a href="{{ url('Administracion/Categorias/Elemento/Borrar/'.$element) }}" class="btn btn-danger">    
                                        <strong>Borrar Elemento</strong>
                                    </a>
                    </div>
                    <button type="submit" class="btn btn-success"><strong>Confirmar cambios</strong></button>   
                                        
                    </div>
                    <div>&nbsp</div>
                </form>
            </div>
        </div>
</div>
        <div class="col col-lg-6">
        <div class="card" >
            <h5 class="card-header">Información de la categoría: {{ $element }}</h5> 
            <div class="card-body">
                <?php 
                    $e = \App\Models\Supercategory::findOrFail($element);
                    $cat = \App\Models\Concretecategory::All();
                ?>
            @if($errors->any())
                <p class="text-success">{{ $errors->first() }}</p>
            @endif
            <p><strong>Nombre:</strong> {{ $e->Nombre }}</p>
            <p><strong>Subcategorias:</strong>
                @foreach($cat as $c)
                    @if($c->supercategory_id == $e->id)
                    <p>{{ $c->Nombre }}</p>
                    @endif
                @endforeach
            </p>
            </div>
        </div>
        </div>
        
        </div>
        <div>
    &nbsp
    </div>
    @elseif ($pest == "Subcategorias")
        <div class="row">
            <div class="col col-lg-6">
            <div class="card" >
                <h5 class="card-header">Modificar</h5> 
                <div class="card-body">
                    <?php $e = \App\Models\Concretecategory::findOrFail($element); ?>
                    <p>Dejar en blanco para conservar valor.</p>
                    <form method='POST'>
                    @csrf
                        <div class="form-group">
                            <label for="stock"><strong>Nombre:</strong></label>
                            <input type="text" maxlength="50" name="tar1" id="tar1" class='form-control' placeholder='{{ $e->Nombre }}'>
                            <div>&nbsp</div>
                            <label for="stock"><strong>Categoría:</strong></label>
                            <select class="custom-select custom-select-lg-1" aria-label="Default select example" id="cat" name="cat">
                                <option value="0" selected>Seleccione una categoría...</option>
                                @foreach ($supercategories as $key2)
                                    <option value="{{ $key2->id }}">{{ $key2->Nombre}}</option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="row">
                        <div class="col col-lg-1"></div>
                        <div class="col col-lg-6">
                            <a href="{{ url('Administracion/Subcategorias/Elemento/Borrar/'.$element) }}" class="btn btn-danger">    
                                            <strong>Borrar Elemento</strong>
                                        </a>
                        </div>
                        <button type="submit" class="btn btn-success"><strong>Confirmar cambios</strong></button>   
                                            
                        </div>
                        <div>&nbsp</div>
                    </form>
                </div>
            </div>
    </div>
            <div class="col col-lg-6">
            <div class="card" >
                <h5 class="card-header">Información de la subcategoría: {{ $element }}</h5> 
                <div class="card-body">
                    <?php 
                        $cat = \App\Models\Concretecategory::findOrFail($element);
                        if($cat->supercategory_id !=null){
                            $scat = \App\Models\Supercategory::findOrFail($cat->supercategory_id);
                        } else {
                            $scat = null;
                        }
                        
                    ?>
                @if($errors->any())
                    <p class="text-success">{{ $errors->first() }}</p>
                @endif
                <p><strong>Nombre:</strong> {{ $cat->Nombre }}</p>
                <p><strong>Pertenece a la categoría:</strong>
                    @if($scat != null)
                    <p>{{ $scat->Nombre }}</p>
                    @else
                    <p>No tiene categoría asignada, por favor asigne una.</p>
                    @endif
                </p>
                </div>
            </div>
            </div>
            
            </div>
    @elseif ($pest == "Cupones")
        <div class="row">
                <div class="col col-lg-6">
                <div class="card" >
                    <h5 class="card-header">Modificar</h5> 
                    <div class="card-body">
                        <?php $e = \App\Models\Coupon::findOrFail($element); ?>
                        <p>Dejar en blanco para conservar valor.</p>
                        <form method='POST'>
                        @csrf
                            <div class="form-group">
                                <label for="stock"><strong>Producto:</strong></label>
                                <select class="custom-select custom-select-lg-1" aria-label="Default select example" id="cat" name="cat">
                                <option value="0" selected>Seleccione un producto...</option>
                                <?php $products = \App\Models\Product::All(); ?>
                                @foreach ($products as $key2)
                                    <option value="{{ $key2->id }}"><?php echo $key2->id.' - '.$key2->Nombre ?></option>
                                @endforeach 
                            </select>
                                <div>&nbsp</div>
                                <label for="stock"><strong>Descuento (€):</strong></label>
                                <input type="text" maxlength="5" name="tar1" id="tar1" class='form-control' placeholder='{{ sprintf('%.2f',$e->Descuento) }}'>
                            </div>
                            <div class="row">
                            <div class="col col-lg-1"></div>
                            <div class="col col-lg-6">
                                <a href="{{ url('Administracion/Cupones/Elemento/Borrar/'.$element) }}" class="btn btn-danger">    
                                                <strong>Borrar Elemento</strong>
                                            </a>
                            </div>
                            <button type="submit" class="btn btn-success"><strong>Confirmar cambios</strong></button>   
                                                
                            </div>
                            <div>&nbsp</div>
                        </form>
                    </div>
                </div>
        </div>
                <div class="col col-lg-6">
                <div class="card" >
                    <h5 class="card-header">Información del cupón: {{ $element }}</h5> 
                    <div class="card-body">
                        <?php 
                            $p = \App\Models\Product::findOrFail($e->product_id);
                        ?>
                    @if($errors->any())
                        @if($errors->first() != 'Cupones agregados correctamente.' && $errors->first() != 'The tar2 field is required.')
                        <p class="text-success">{{ $errors->first() }}</p>
                        @endif
                    @endif
                    <p><strong>Producto:</strong> <?php echo $p->id.' - '.$p->Nombre ?></p>
                    <p><strong>Descuento:</strong>{{ sprintf('%.2f',$e->Descuento) }}€</p>
                    </div>
                </div>
                <div>
                &nbsp
                </div>
                    <div class="card" >
                        <h5 class="card-header">Asignar cupones a usuario</h5>
                        <div class="card-body">
                            <p>Si el usuario ya tiene instancias de este cupón, reemplaza su cantidad por la indicada abajo.</p>
                            @if($errors->any())
                                @if($errors->first() == 'The tar2 field is required.' )
                                    <p class="text-danger">{{ $errors->first() }}</p>
                                @elseif($errors->first() == 'Cupones agregados correctamente.')
                                    <p class="text-success">{{ $errors->first() }}</p>
                                @endif
                            @endif
                        <form method="POST" action="{{ url('/Administracion/Cupones/Add/Elemento/'.$element) }}">
                            @csrf
                                <div class="form-group">
                                    <label for="stock"><strong>Producto:</strong></label>
                                    <select class="custom-select custom-select-lg-1" aria-label="Default select example" id="user" name="user">
                                    <option value="0" selected>Seleccione un usuario...</option>
                                    <?php $users = \App\Models\User::All(); ?>
                                    @foreach ($users as $key2)
                                        <option value="{{ $key2->id }}"><?php echo $key2->Nombre.' '.$key2->Apellidos.' - '.$key2->Email; ?></option>
                                    @endforeach 
                                </select>
                                    <div>&nbsp</div>
                                    <label for="stock"><strong>Cantidad:</strong></label>
                                    <input type="text" maxlength="4" name="tar2" id="tar2" class='form-control' placeholder='1'>
                                </div>
                                <div class="row">
                                <div class="col col-lg-8">
                                </div>
                                <div class="col col-lg-4">
                                <div>&nbsp</div>
                                <button type="submit" class="btn btn-success"><strong>Añadir cupones</strong></button>   
                                </div>               
                                </div>
                                <div>&nbsp</div>
                        </form>
                        </div>
                    </div>
                </div> 
            </div>
    @endif
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