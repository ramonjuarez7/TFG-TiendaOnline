@extends('layouts.master')

@section('title', 'Butore Store - Login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('Accede con tus datos a Butore Store') }}</strong></div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passwd" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="passwd" type="password" class="form-control @error('passwd') is-invalid @enderror" name="passwd" required autocomplete="new-password">

                                @error('passwd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar Sesión') }}
                                </button>

                            </div>
                        </div>
                        
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
    </div>
    @if($credentialerror)
    <div>
    &nbsp
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-danger mb-3">
                    <div>
                    &nbsp
                    </div>

                    <div class="col-sm col-lg-1">
                    </div>
                    <div class="col-sm">
                        <p class="text-danger text-center">Credenciales incorrectas.</p>
                    </div>

                    <div>
                    &nbsp
                    </div>
                </div>
            </div>
        </div>  
    </div>
    @endif
    
    <div>
    &nbsp
    </div>
@endsection