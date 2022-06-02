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
        <p> Creación de un elemento.</p>    
    </header><!-- sect-heading -->
    @if($errors->any())
            <p class="text-success">{{ $errors->first() }}</p>
        @endif
    @if($pest == "Productos")
    <div class="row">
    <div class="col col-lg-12">
    <div class="card" >
        <h5 class="card-header">Crear un nuevo producto</h5> 
        <div class="card-body">
            <form method='POST' enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col col-lg-6">
                <div class="form-group">
                    <label for="stock"><strong>Nombre*:</strong></label>
                    <input type="text" maxlength="50" name="tar1" id="tar1" class='form-control' placeholder='Nombre' required>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Información*:</strong></label>
                    <input type="text" maxlength="50" name="tar2" id="tar2" class='form-control' placeholder='Información' required>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Peso/Volumen*:</strong></label>
                    <input type="text" maxlength="50" name="tar3" id="tar3" class='form-control' placeholder='0.0' required>
                </div>
                <label for="stock"><strong>Medicion:</strong></label>
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
                <div>&nbsp</div>
                <div class="form-group">
                    <label for="stock"><strong>Precio Individual (€)*:</strong></label>
                    <input type="text" maxlength="50" name="tar4" id="tar4" class='form-control' placeholder='0.00' required>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Precio por Peso/Volumen (€)*:</strong></label>
                    <input type="text" maxlength="50" name="tar5" id="tar5" class='form-control' placeholder='0.00' required>
                </div>
            </div>
            <div class="col col-lg-6">
                <div class="form-group">
                    <label for="stock"><strong>Stock*:</strong></label>
                    <input type="text" maxlength="50" name="tar6" id="tar6" class='form-control' placeholder='0' required>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Maximo por pedido*:</strong></label>
                    <input type="text" maxlength="50" name="tar7" id="tar7" class='form-control' placeholder='0' required>
                </div>
                <label for="stock"><strong>Novedad:</strong></label>
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
                <div>&nbsp</div>
                <label for="stock"><strong>Categoría*:</strong></label>
                <select class="custom-select custom-select-lg-1" aria-label="Default select example" id="cat" name="cat" required>
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
                
                <div>&nbsp</div>
                <div class="form-group">
                    <label for="imagen"><strong>Imagen*:</strong></label>
                    <div class="custom-file">
                        <input type="file" name="imagen" id="imagen" class="custom-file-input mb-2" accept=".jpg,.gif,.png">
                        <label class="custom-file-label" for="imagen" data-browse="Examinar">Elige una imagen</label>
                    </div>
                </div>
                <div>&nbsp</div>
                <div class="row">
                <div class="col col-lg-9">
                </div>
                <button type="submit" class="btn btn-success"><strong>Crear producto</strong></button>   
                                    
                </div>
                </div>
                        </div>
                        </div>
                
                <div>&nbsp</div>
            </form>
    </div>
    </div>
    </div>
    
    </div>
    <div>
&nbsp
</div>
    @elseif ($pest == "Usuarios")
            <div class="row">
            <div class="col col-lg-12">
            <div class="card" >
                <h5 class="card-header">Crear nuevo usuario</h5> 
                <div class="card-body">
                    <form method='POST'>
                    @csrf
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="stock"><strong>Nombre*:</strong></label>
                                <input type="text" maxlength="50" name="tar1" id="tar1" class='form-control' placeholder='Nombre' require>
                            </div>
                            <div class="form-group">
                                <label for="stock"><strong>Apellidos*:</strong></label>
                                <input type="text" maxlength="50" name="tar2" id="tar2" class='form-control' placeholder='Apellidos' require>
                            </div>
                            <div class="form-group">
                                <label for="stock"><strong>DNI/NIF*:</strong></label>
                                <input type="text" maxlength="9" name="tar3" id="tar3" class='form-control' placeholder='DNI/NIF' require>
                            </div>
                            <div class="form-group">
                                <label for="stock"><strong>Email*:</strong></label>
                                <input type="text" maxlength="50" name="tar4" id="tar4" class='form-control' placeholder='example@email.com' require>
                            </div>
                            <div class="form-group">
                                <label for="stock"><strong>Fecha de Nacimiento*:</strong></label>
                                <input type="text" maxlength="10" name="tar5" id="tar5" class='form-control' placeholder='01/01/1900' require>
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="stock"><strong>Teléfono*:</strong></label>
                                <input type="text" maxlength="9" name="tar6" id="tar6" class='form-control' placeholder='000000000' require>
                            </div>
                            <div class="form-group">
                                <label for="stock"><strong>Dirección de envío*:</strong></label>
                                <input type="text" maxlength="50" name="tar7" id="tar7" class='form-control' placeholder='Dirección de envío' require>
                            </div>
                            <div class="form-group">
                                <label for="stock"><strong>Dirección de facturación (en blanco si igual que la de envío):</strong></label>
                                <input type="text" maxlength="50" name="tar8" id="tar8" class='form-control' placeholder='Dirección de facturación'>
                            </div>
                            <div class="form-group">
                                <label for="stock"><strong>Contraseña*:</strong></label>
                                <input type="password" maxlength="50" name="tar9" id="tar9" class='form-control' placeholder='****' require>
                            </div>
                            <div>&nbsp</div>
                            <label for="stock"><strong>Privilegios*:</strong></label>
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
                            <div>&nbsp</div>
                            <div class="row">
                            <div class="col col-lg-8"></div>
                            <div class="col">
                                <button type="submit" class="btn btn-success"><strong>Crear Usuario</strong></button>   
                            </div>
                        </div>
                        </div>
                        </div>
                                        
                        </div>
                        <div>&nbsp</div>
                    </form>
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
            <h5 class="card-header">Crear nueva Categoría</h5> 
            <div class="card-body">
                <form method='POST'>
                @csrf
                    <div class="form-group">
                        <label for="stock"><strong>Nombre*:</strong></label>
                        <input type="text" maxlength="50" name="tar1" id="tar1" class='form-control' placeholder='Nombre' require>
                    </div>
                    <div class="row">
                    <div class="col col-lg-8"></div>
                    <div class="col col-lg-4">
                        <button type="submit" class="btn btn-success"><strong>Crear Categoría</strong></button>   
                    </div>
                    
                                        
                    </div>
                    <div>&nbsp</div>
                </form>
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
                    <form method='POST'>
                    @csrf
                        <div class="form-group">
                            <label for="stock"><strong>Nombre*:</strong></label>
                            <input type="text" maxlength="50" name="tar1" id="tar1" class='form-control' placeholder='Nombre' require>
                            <div>&nbsp</div>
                            <label for="stock"><strong>Categoría*:</strong></label>
                            <select class="custom-select custom-select-lg-1" aria-label="Default select example" id="cat" name="cat" require>
                                <option value="0" selected>Seleccione una categoría...</option>
                                @foreach ($supercategories as $key2)
                                    <option value="{{ $key2->id }}">{{ $key2->Nombre}}</option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="row">
                        <div class="col col-lg-8"></div>
                        <button type="submit" class="btn btn-success"><strong>Crear Subcategoría</strong></button>   
                                            
                        </div>
                        <div>&nbsp</div>
                    </form>
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
                                <input type="text" maxlength="5" name="tar1" id="tar1" class='form-control' placeholder='0.00'>
                            </div>
                            <div class="row">
                            <div class="col col-lg-9">
                            </div>
                            <button type="submit" class="btn btn-success"><strong>Crear Cupón</strong></button>   
                                                
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