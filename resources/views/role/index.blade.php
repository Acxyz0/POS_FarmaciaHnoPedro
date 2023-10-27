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
                    <div class="mb-4">
                        <a href="{{route('roles.create')}}">
                            <button type="button" class="btn btn-primary">Añadir nuevo rol</button>
                        </a>
                    </div>
                    <table id="datatablesSimple" class="table table-striped fs-6">
                        <thead>
                            <tr>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item)
                            <tr>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        
                                        @can('editar-role')
                                        <form action="{{route('roles.edit',['role'=>$item])}}" method="get">
                                            <button type="submit" class="btn btn-warning">Editar</button>
                                        </form>
                                        @endcan
        
                                        @can('eliminar-role')
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmModal-{{$item->id}}">Eliminar</button>
                                        @endcan
        
                                    </div>
                                </td>
                            </tr>
        
                            <!-- Modal de confirmación-->
                            <div class="modal fade" id="confirmModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Seguro que quieres eliminar el rol?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('roles.destroy',['role'=>$item->id]) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Confirmar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
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
