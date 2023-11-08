@extends('adminlte::page')

@section('title', 'Clientes')

@vite('resources/css/app.css')

@section('content')
    <div class="container pt-4 mx-auto">
        <div class="card">
            <div class="mx-auto text-teal-500 font-bold text-3xl">
                EDITAR CLIENTE
            </div>
            <form action="{{ route('clientes.update', ['cliente' => $cliente]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @if ($cliente->persona->tipo_persona == 'natural')
                            <label id="label-natural" for="razon_social" class="form-label">Nombres y apellidos:</label>
                            @else
                            <label id="label-juridica" for="razon_social" class="form-label">Nombre de la empresa:</label>
                            @endif
    
                            <input required type="text" name="razon_social" id="razon_social" class="form-control" value="{{old('razon_social',$cliente->persona->razon_social)}}">
    
                            @error('razon_social')
                            <small class="text-danger">{{'*'.$message}}</small>
                            @enderror
                        </div>
    
                        <!------Dirección---->
                        <div class="col-12">
                            <label for="direccion" class="form-label">Dirección:</label>
                            <input required type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion',$cliente->persona->direccion)}}">
                            @error('direccion')
                            <small class="text-danger">{{'*'.$message}}</small>
                            @enderror
                        </div>
    
                        <!--------------Documento------->
                        <div class="col-md-4">
                            <label for="documento_id" class="form-label">Tipo de documento:</label>
                            <select class="form-control" name="documento_id" id="documento_id">
                                @foreach ($documentos as $item)
                                @if ($cliente->persona->documento_id == $item->id)
                                <option selected value="{{$item->id}}" {{ old('documento_id') == $item->id ? 'selected' : '' }}>{{$item->tipo_documento}}</option>
                                @else
                                <option value="{{$item->id}}" {{ old('documento_id') == $item->id ? 'selected' : '' }}>{{$item->tipo_documento}}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('documento_id')
                            <small class="text-danger">{{'*'.$message}}</small>
                            @enderror
                        </div>
    
                        <div class="col-md-4">
                            <label for="numero_documento" class="form-label">Numero de documento:</label>
                            <input required type="text" name="numero_documento" id="numero_documento" class="form-control" value="{{old('numero_documento',$cliente->persona->numero_documento)}}">
                            @error('numero_documento')
                            <small class="text-danger">{{'*'.$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="nit" class="form-label">NIT:</label>
                            <input required type="text" name="nit" id="nit" class="form-control" value="{{old('nit',$cliente->persona->nit)}}">
                            @error('nit')
                            <small class="text-danger">{{'*'.$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-center space-x-4">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 px-3 py-2 rounded-md text-white font-bold">
                        Guardar
                    </button>
                    <a href="{{ route('clientes.index') }}">
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
@stop

@push('css')
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
