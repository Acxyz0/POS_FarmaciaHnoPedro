@extends('adminlte::page')

@section('title', 'Compras')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="col pt-4">
            <div class="card mb-4">
                <div class=" mx-auto text-teal-500 font-bold text-3xl">
                    COMPRAS
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="card-header">
                            <p class="">Nota: Los usuarios son los que pueden ingresar al sistema</p>
                        </div>
                        <div class="card-body">
            
                            <!---Nombre---->
                            <div class="row mb-4">
                                <label for="name" class="col-lg-2 col-form-label">Nombres:</label>
                                <div class="col-lg-4">
                                    <input autocomplete="off" type="text" name="name" id="name" class="form-control" value="{{old('name')}}" aria-labelledby="nameHelpBlock">
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-text" id="nameHelpBlock">
                                        Escriba un solo nombre
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    @error('name')
                                    <small class="text-danger">{{'*'.$message}}</small>
                                    @enderror
                                </div>
                            </div>
            
                            <!---Email---->
                            <div class="row mb-4">
                                <label for="email" class="col-lg-2 col-form-label">Email:</label>
                                <div class="col-lg-4">
                                    <input autocomplete="off" type="email" name="email" id="email" class="form-control" value="{{old('email')}}" aria-labelledby="emailHelpBlock">
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-text" id="emailHelpBlock">
                                        Dirección de correo eléctronico
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    @error('email')
                                    <small class="text-danger">{{'*'.$message}}</small>
                                    @enderror
                                </div>
                            </div>
            
                            <!---Password---->
                            <div class="row mb-4">
                                <label for="password" class="col-lg-2 col-form-label">Contraseña:</label>
                                <div class="col-lg-4">
                                    <input type="password" name="password" id="password" class="form-control" aria-labelledby="passwordHelpBlock">
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-text" id="passwordHelpBlock">
                                        Escriba una constraseña segura. Debe incluir números.
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    @error('password')
                                    <small class="text-danger">{{'*'.$message}}</small>
                                    @enderror
                                </div>
                            </div>
            
                            <!---Confirm_Password---->
                            <div class="row mb-4">
                                <label for="password_confirm" class="col-lg-2 col-form-label">Confirmar:</label>
                                <div class="col-lg-4">
                                    <input type="password" name="password_confirm" id="password_confirm" class="form-control" aria-labelledby="passwordConfirmHelpBlock">
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-text" id="passwordConfirmHelpBlock">
                                        Vuelva a escribir su contraseña.
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    @error('password_confirm')
                                    <small class="text-danger">{{'*'.$message}}</small>
                                    @enderror
                                </div>
                            </div>
            
                            <!---Roles---->
                            <div class="row mb-4">
                                <label for="role" class="col-lg-2 col-form-label">Rol:</label>
                                <div class="col-lg-4">
                                    <select name="role" id="role" class="form-select" aria-labelledby="rolHelpBlock">
                                        <option value="" selected disabled>Seleccione:</option>
                                        @foreach ($roles as $item)
                                        <option value="{{$item->name}}" @selected(old('role')==$item->name)>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-text" id="rolHelpBlock">
                                        Escoja un rol para el usuario.
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    @error('role')
                                    <small class="text-danger">{{'*'.$message}}</small>
                                    @enderror
                                </div>
                            </div>
            
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .card {
            display: flex;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.36);
        }
    </style>
@endpush

@section('js')
@stop
