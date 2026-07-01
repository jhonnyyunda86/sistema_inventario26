@extends('layouts.sidebaradmin')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Registro de Usuario</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Nuevo Usuario</h3>
                    </div>
                    
                    <form method="POST" action="">
                        @csrf
                       
                        <div class="card-body">
                            <!-- Rol -->
                        <div class="form-group">
                            <label for="role">Rol</label>
                            <select  class="form-control @error('role') is-invalid @enderror" id="role_id" name="role_id" > 
                                <option value="">Seleccione un rol</option>
                                <option value="1">Administrador</option>
                                <option value="2">Vendedor</option>
                                <option value="3">Cliente</option>
                            </select>


                        </div>
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Ingrese nombre">
                             
                                 
                            </div>

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Ingrese correo">
                             
                                 
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="Ingrese contraseña">
                                 
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme contraseña">
                           
                            </div>
                        </div>
                        
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a class="text-sm text-secondary" href="{{ route('login') }}">
                                ¿Ya está registrado?
                            </a>
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
