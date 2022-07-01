@extends('layouts.master')

@section('title', 'Butore Store - Registro')


@section('content')
    <h1 style="text-align:center;" class="display-4">Registro</h1>

    <!-- ------------------------- -->
    <div>
    &nbsp   
    </div>
    
    </div>
    <!-- ------------------------- -->
    <form method='POST'>
        @csrf
        <div class="row">
            <div class="col-sm col-lg-2"></div>
            <div class="col-sm col-lg-3">
                <div>
                    <p>Información del usuario:</p>
                </div>
                <div>
                &nbsp
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Nombre*</strong></label>
                    <input type="text" name="nombre" id="nombre" class='form-control' placeholder='Nombre' required>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Apellidos*</strong></label>
                    <input type="text" name="apellidos" id="nombre" class='form-control' placeholder='Apellidos' required>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Fecha de nacimiento*</strong></label>
                    <input type="text" maxlength="10" name="nacimiento" id="nacimiento" class='form-control' placeholder='DD/MM/AAAA' required>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>DNI/NIF*</strong></label>
                    <input type="text" maxlength="9" name="dni" id="nombre" class='form-control' placeholder='DNI/NIF' required>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Teléfono*</strong></label>
                    <input type="text" maxlength="9" name="telefono" id="telefono" class='form-control' placeholder='Teléfono' required>
                </div>
                
                
            </div>
            <div class="col-sm col-lg-1"></div>
            <div class="col-sm col-lg-3">
            <div>
                    <p>Direcciones:</p>
                </div>
                <div>
                &nbsp
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Dirección de envío*</strong></label>
                    <input type="text" maxlength="50" name="envio" id="envio" class='form-control' placeholder='Dirección de envío' required>
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Dirección de facturación</strong> (no rellenar si es la misma que de envío)</label>
                    <input type="text" name="facturacion" id="facturacion" class='form-control' placeholder='Dirección de facturación' required>
                </div>  
            <div>
                    <p>Credenciales:</p>
                </div>
                <div>
                &nbsp
                </div>
                <div class="form-group">
                    <label for="stock"><strong>Email*</strong></label>
                    <input type="text" maxlength="50" name="email" id="email" class='form-control' placeholder='Email' required>
                </div>

                <div class="form-group">
                    <label for="minStock"><strong>Contraseña*</strong></label>
                    <input type="password" maxlength="20" name="passwd" id="passwd" class='form-control' placeholder='****' required>
                </div>
                <div class="form-group">
                    <label for="minStock"><strong>Repetir Contraseña*</strong></label>
                    <input type="password" maxlength="20" name="passwd_confirmation" id="passwd_confirmation" class='form-control' placeholder='****' required>
                </div>
                <div>
                &nbsp
                </div>
                <div class="row">
                    <div class="col col-lg-9">
                    </div>
                    <div class="col col-lg-2">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </div>
                <div>
                &nbsp
                </div>
            </div>
        </div>
    </form>

@endsection