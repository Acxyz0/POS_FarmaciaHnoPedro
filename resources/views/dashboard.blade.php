@extends('adminlte::page')

@section('title', 'Dashboard')

@vite('resources/css/app.css')

@section('content')
    <div class="container pt-4 grid-cols-12">
        <div class="card">
            <div class="mx-auto p-1 font-bold vw text-teal text-responsive">
                BIENVENIDO
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 py-3">
                        <a href="{{ url('/movimientos') }}">
                            <div
                                class="bg-yellow-400 hover:bg-yellow-500 font-bold text-center px-3 py-4 h-32 rounded-xl shadow-md shadow-slate-400">
                                <div class="card-icon text-white">
                                    <i class="fas fa-coins fa-2x"></i> Transacción
                                </div>
                                <div class="card-content w-full text-right">
                                    <span class="fas fa-chevron-right text-white fa-2x"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 py-3">
                        <a href="{{ url('/gestionVentas') }}">
                            <div
                                class="bg-cyan-500 hover:bg-cyan-600 font-bold text-center px-3 py-4 h-32 rounded-xl shadow-md shadow-slate-400">
                                <div class="card-icon text-white">
                                    <i class="fas fa-shopping-cart fa-2x"></i> Ventas
                                </div>
                                <div class="card-content w-full text-right">
                                    <span class="fas fa-chevron-right text-white fa-2x"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 py-3">
                        <a href="{{ url('/compras') }}">
                            <div
                                class="bg-blue-500 hover:bg-blue-600 font-bold text-center px-3 py-4 h-32 rounded-xl shadow-md shadow-slate-400">
                                <div class="card-icon text-white">
                                    <i class="fas fa-truck fa-2x"></i> Compras
                                </div>
                                <div class="card-content w-full text-right">
                                    <span class="fas fa-chevron-right text-white fa-2x"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 py-3">
                        <a href="#">
                            <div
                                class="bg-purple-600 hover:bg-purple-700 font-bold text-center px-3 py-4 h-32 rounded-xl shadow-md shadow-slate-400">
                                <div class="card-icon text-lg text-white">
                                    <i class="fas fa-reply fa-2x"></i> Devoluciones
                                </div>
                                <div class="card-content w-full text-right">
                                    <span class="fas fa-chevron-right text-white fa-2x"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 py-3">
                        <a href="#">
                            <div
                                class="bg-red-500 hover:bg-red-600 font-bold text-center px-3 py-4 h-32 rounded-xl shadow-md shadow-slate-400">
                                <div class="card-icon text-white">
                                    <i class="fas fa-boxes fa-2x"></i> Productos
                                </div>
                                <div class="card-content w-full text-right">
                                    <span class="fas fa-chevron-right text-white fa-2x"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 py-3">
                        <a href="{{ url('/ajustes') }}">
                            <div
                                class="bg-gray-500 hover:bg-gray-600 font-bold text-center px-3 py-4 h-32 rounded-xl shadow-md shadow-slate-400">
                                <div class="card-icon text-white text-lg">
                                    <i class="fas fa-wrench fa-2x"></i> Configuración
                                </div>
                                <div class="card-content w-full text-right">
                                    <span class="fas fa-chevron-right text-white fa-2x"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card {
            display: flex;
            align-items: center;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.36);
        }

        .card-icon {
            font-size: 24px;
            margin-right: 20px;
        }

        .text-responsive {
            font-size: 7vw;
        }
    </style>
@stop

@section('js')
@stop
