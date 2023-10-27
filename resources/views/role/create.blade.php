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
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <!---Nombre de rol---->
                        <div class="row mb-4">
                            <label for="name" class="col-md-auto col-form-label">Nombre del rol:</label>
                            <div class="col-md-4">
                                <input autocomplete="off" type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                            </div>
                            <div class="col-md-4">
                                @error('name')
                                <small class="text-danger">{{'*'.$message}}</small>
                                @enderror
                            </div>
                        </div>
        
                        <!---Permisos---->
                        <div class="col-12">
                            <p class="text-muted">Permisos para el rol:</p>
                            @foreach ($permisos as $item)
                            <div class="form-check mb-2">
                                <input type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                                <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                            </div>
                            @endforeach
                        </div>
                        @error('permission')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
        
                        <div class="col-12 text-center">
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
