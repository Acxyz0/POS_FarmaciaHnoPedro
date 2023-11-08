@extends('adminlte::page')

@section('title', 'Proveedores')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="row pt-4">
            <div class="col">
                <div class="card">
                    <div class=" mx-auto text-teal-500 font-bold text-3xl">
                        PROVEEDORES
                    </div>
                    <div class="card-body">
                        <div class="container mx-auto pb-2">
                            <div class="row">
                                @can('crear-proveedore')
                                    <div class="col pl-0">
                                        <a href="{{ route('proveedores.create') }}">
                                            <button
                                                class="bg-cyan-600 text-white hover:bg-cyan-800 p-2 rounded-md text-md"><span
                                                    class="fas fa-fw fa-plus"></span>
                                                Añadir nuevo registro
                                            </button>
                                        </a>
                                    </div>
                                @endcan
                                <div class="col-span">
                                    <div class="content-input-search-category input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Buscar" id="myInput"
                                            onkeyup="myFunction()">
                                        <div class="input-group-append">
                                            <button class="bg-cyan-600 text-white px-3 rounded-right" type="submit"><span
                                                    class="fas fa-fw fa-search"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="content-table">
                            <table class="table table-auto whitespace-nowrap text-md" id="myTable">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Documento</th>
                                        <th>NIT</th>
                                        <th>Tipo de persona</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proveedores as $item)
                                        <tr>
                                            <td>
                                                {{ $item->persona->razon_social }}
                                            </td>
                                            <td>
                                                {{ $item->persona->direccion }}
                                            </td>
                                            <td>
                                                <p class="fw-semibold mb-1">{{ $item->persona->documento->tipo_documento }}
                                                </p>
                                                <p class="text-muted mb-0">{{ $item->persona->numero_documento }}</p>
                                            </td>
                                            <td>
                                                {{ $item->persona->nit }}
                                            </td>
                                            <td>
                                                {{ $item->persona->tipo_persona }}
                                            </td>
                                            <td class="text-center">
                                                @if ($item->persona->estado == 1)
                                                    <span class="rounded-md py-1 px-2 bg-green">activo</span>
                                                @else
                                                    <span class="rounded-md py-1 px-2 bg-red">eliminado</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @can('editar-proveedore')
                                                    <a href="{{ route('proveedores.edit', ['proveedore' => $item]) }}">
                                                        <button type="submit" class="bg-warning py-2 px-3 rounded-md"><span
                                                                class="fas fa-fw fa-pen text-white"></span></button>
                                                    </a>
                                                @endcan
                                                @can('eliminar-proveedore')
                                                    <form
                                                        action="{{ route('proveedores.destroy', ['proveedore' => $item->persona->id]) }}"
                                                        class="d-inline form-eliminar" method="POST">
                                                        @method('DELETE')
                                                        @csrf

                                                        @if ($item->persona->estado == 1)
                                                            <button type="submit"
                                                                class="bg-red-600 hover:bg-red-700 py-2 px-3 rounded-md"><span
                                                                    class="fas fa-fw fa-trash text-white"></span>
                                                            </button>
                                                        @else
                                                            <button type="submit"
                                                                class="bg-slate-500 hover:bg-slate-600 py-2 px-3 rounded-md"><span
                                                                    class="fas fa-fw fa-share text-white"></span>
                                                            </button>
                                                        @endif
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, j, visible;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) { // Comienza desde 1 en lugar de 0 para ignorar el encabezado
                visible = false;
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        visible = true;
                    }
                }
                if (visible === true) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
@stop
