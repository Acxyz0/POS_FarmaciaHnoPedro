@extends('adminlte::page')

@section('title', 'Usuarios')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="col pt-4">
            <div class="card mb-4">
                <div class=" mx-auto text-teal-500 font-bold text-3xl">
                    EDITAR USUARIO
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="card-body">
                            <!---Nombre---->
                            <div class="row mb-4">
                                <label for="name" class="col-lg-2 col-form-label">Nombres:</label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name', $user->name) }}">
                                </div>
                                <div class="col-lg-2">
                                    @error('name')
                                        <small class="text-danger">{{ '*' . $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!---Email---->
                            <div class="row mb-4">
                                <label for="email" class="col-lg-2 col-form-label">Email:</label>
                                <div class="col-lg-4">
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email', $user->email) }}">
                                </div>
                                <div class="col-lg-2">
                                    @error('email')
                                        <small class="text-danger">{{ '*' . $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!---Password---->
                            <div class="row mb-4">
                                <label for="password" class="col-lg-2 col-form-label">Contraseña:</label>
                                <div class="col-lg-4">
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-text">
                                        Escriba una constraseña segura. Debe incluir números.
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    @error('password')
                                        <small class="text-danger">{{ '*' . $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!---Confirm_Password---->
                            <div class="row mb-4">
                                <label for="password_confirm" class="col-lg-2 col-form-label">Confirmar:</label>
                                <div class="col-lg-4">
                                    <input type="password" name="password_confirm" id="password_confirm"
                                        class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-text">
                                        Vuelva a escribir su contraseña.
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    @error('password_confirm')
                                        <small class="text-danger">{{ '*' . $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!---Roles---->
                            <div class="row mb-4">
                                <label for="role" class="col-lg-2 col-form-label">Seleccionar rol:</label>
                                <div class="col-lg-4">
                                    <select name="role" id="role" class="form-control">
                                        @foreach ($roles as $item)
                                            @if (in_array($item->name, $user->roles->pluck('name')->toArray()))
                                                <option selected value="{{ $item->name }}" @selected(old('role') == $item->name)>
                                                    {{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->name }}" @selected(old('role') == $item->name)>
                                                    {{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    @error('role')
                                        <small class="text-danger">{{ '*' . $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="text-center space-x-4">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 px-3 py-2 rounded-md text-white font-bold">
                                Guardar
                            </button>
                            <a href="{{ route('users.index') }}">
                                <button type="button"
                                    class="bg-red-500 hover:bg-red-700 px-3 py-2 rounded-md text-white font-bold">
                                    Cancelar
                                </button>
                            </a>
                            <button type="reset"
                                class="bg-slate-500 hover:bg-slate-600 px-3 py-2 rounded-md text-white font-bold">
                                Reiniciar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
@stop
