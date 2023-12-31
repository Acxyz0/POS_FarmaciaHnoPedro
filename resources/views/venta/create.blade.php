@extends('adminlte::page')

@section('title', 'Ventas')

@vite('resources/css/app.css')

@section('content')

    @include('layouts.partials.alert')

    <div class="container mx-auto">
        <div class="row pt-4">
            <div class="col">
                <div class="card">
                    <div class="row container">
                        <div class="">
                            <a href="{{ route('ventas.index') }}">
                                <button type="button"
                                    class="bg-red-500 hover:bg-red-700 px-3 py-2 rounded-md text-white font-bold text-center">
                                    <span class="fas fa-angle-left"></span>
                                </button>
                            </a>
                        </div>
                        <div class="mx-auto text-teal-500 text-center font-bold text-3xl">
                            REALIZAR VENTA
                        </div>
                    </div>
                    <div class="cardbody">
                        <form action="{{ route('ventas.store') }}" method="post">
                            @csrf

                            <div class="container-lg mt-4">
                                <div class="row gy-4">
                                    <!------Venta producto---->
                                    <div class="col-xl-8">
                                        <div class="text-white bg-info p-1 text-center">
                                            Detalles de la venta
                                        </div>
                                        <div class="p-3 border border-3 border-info">
                                            <div class="row">
                                                <!-----Producto---->
                                                <div class="col-md-12">
                                                    <select name="producto_id" id="producto_id"
                                                        class="form-control" data-live-search="true"
                                                        data-size="5" title="Busque un producto aquí">
                                                        @foreach ($productos as $item)
                                                            <option
                                                                value="{{ $item->id }}-{{ $item->stock }}-{{ $item->precio_venta }}">
                                                                {{ $item->codigo . ' ' . $item->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-----Stock--->
                                                <div class="col-md-6 py-2">
                                                    <label for="stock" class="form-label">Stock:</label>
                                                    <input disabled id="stock" type="text" class="form-control">
                                                </div>

                                                <!-----Precio de venta---->
                                                <div class="col-md-6 py-2">
                                                    <label for="precio_venta" class="form-label">Precio de venta:</label>
                                                    <input type="number" name="precio_venta" id="precio_venta"
                                                        class="form-control" step="0.1" readonly>
                                                </div>

                                                <!-----Cantidad---->
                                                <div class="col-md-6 py-2">
                                                    <label for="cantidad" class="form-label">Cantidad:</label>
                                                    <input type="number" name="cantidad" id="cantidad" min="0"
                                                        class="form-control">
                                                </div>

                                                <!-----Descuento---->
                                                <div class="col-md-6 py-2">
                                                    <label for="descuento" class="form-label">Descuento:</label>
                                                    <input type="number" name="descuento" id="descuento"
                                                        class="form-control" step="0.1" min="0">
                                                </div>

                                                <!-----botón para agregar--->
                                                <div class="col-12 py-2 text-end">
                                                    <button id="btn_agregar" class="bg-cyan-600 text-white hover:bg-cyan-700 p-2 rounded-md text-md"
                                                        type="button">Agregar</button>
                                                </div>

                                                <!-----Tabla para el detalle de la venta--->
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table id="tabla_detalle" class="table table-hover">
                                                            <thead class="bg-info">
                                                                <tr>
                                                                    <th class="text-white">#</th>
                                                                    <th class="text-white">Producto</th>
                                                                    <th class="text-white">Cantidad</th>
                                                                    <th class="text-white">Precio venta</th>
                                                                    <th class="text-white">Descuento</th>
                                                                    <th class="text-white">Subtotal</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th></th>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th></th>
                                                                    <th colspan="4">Sumas</th>
                                                                    <th colspan="2"><span id="sumas">0</span></th>
                                                                </tr>
                                                                <tr>
                                                                    <th></th>
                                                                    <th colspan="4">IVA %</th>
                                                                    <th colspan="2"><span id="iva">0</span></th>
                                                                </tr>
                                                                <tr>
                                                                    <th></th>
                                                                    <th colspan="4">Total</th>
                                                                    <th colspan="2"> <input type="hidden" name="total"
                                                                            value="0" id="inputTotal"> <span
                                                                            id="total">0</span></th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>

                                                <!--Boton para cancelar venta-->
                                                <div class="col-12">
                                                    <button id="cancelar" type="button" class="btn btn-danger"
                                                        data-toggle="modal" data-target="#exampleModal">
                                                        Cancelar venta
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-----Venta---->
                                    <div class="col-xl-4">
                                        <div class="text-white bg-info p-1 text-center">
                                            Datos generales
                                        </div>
                                        <div class="p-3 border border-3 border-info">
                                            <div class="row">
                                                <!--Proveedor-->
                                                <div class="col-12">
                                                    <label for="cliente_id" class="form-label">Cliente:</label>
                                                    <select name="cliente_id" id="cliente_id"
                                                        class="form-control show-tick"
                                                        data-live-search="true" title="Selecciona" data-size='5'>
                                                        <option value=""></option>
                                                        @foreach ($clientes as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->persona->nit . ' - ' . $item->persona->razon_social }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('cliente_id')
                                                        <small class="text-danger">{{ '*' . $message }}</small>
                                                    @enderror
                                                </div>

                                                <!--Tipo de comprobante-->
                                                <div class="col-12">
                                                    <label for="comprobante_id" class="form-label">Comprobante:</label>
                                                    <select name="comprobante_id" id="comprobante_id"
                                                        class="form-control" title="Selecciona">
                                                        <option value=""></option>
                                                        @foreach ($comprobantes as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->tipo_comprobante }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('comprobante_id')
                                                        <small class="text-danger">{{ '*' . $message }}</small>
                                                    @enderror
                                                </div>

                                                <!--Numero de comprobante-->
                                                <div class="col-12">
                                                    <label for="numero_comprobante" class="form-label">Numero de
                                                        comprobante:</label>
                                                    <input required type="text" name="numero_comprobante"
                                                        id="numero_comprobante" class="form-control"
                                                        value="{{ $ventaId }}">
                                                    @error('numero_comprobante')
                                                        <small class="text-danger">{{ '*' . $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- Total --}}
                                                <div class="col-12">
                                                    <label for="inputTotal2">Total</label>
                                                    <input type="number" id="inputTotal2" class="form-control"
                                                        step="0.1" min="0">
                                                </div>

                                                {{-- Efectivo --}}
                                                <div class="col-12">
                                                    <label for="inputTotal2">Efectivo</label>
                                                    <input type="number" id="efectivo" class="form-control"
                                                        name="efectivo" step="0.1" min="0"
                                                        oninput="calculate()">
                                                </div>

                                                {{-- Cambio --}}
                                                <div class="col-12">
                                                    <label for="inputTotal2">Cambio</label>
                                                    <input type="number" id="cambio" class="form-control"
                                                        name="cambio" step="0.1" min="0">
                                                </div>

                                                <!--Impuesto---->
                                                <div class="col-sm-6">
                                                    <label for="impuesto" class="form-label">Impuesto(IVA):</label>
                                                    <input readonly type="text" name="impuesto" id="impuesto"
                                                        class="form-control border-success">
                                                    @error('impuesto')
                                                        <small class="text-danger">{{ '*' . $message }}</small>
                                                    @enderror
                                                </div>

                                                <!--Fecha--->
                                                <div class="col-sm-6">
                                                    <label for="fecha" class="form-label">Fecha:</label>
                                                    <input readonly type="date" name="fecha" id="fecha"
                                                        class="form-control border-success" value="<?php echo date('Y-m-d'); ?>">
                                                    <?php
                                                    
                                                    use Carbon\Carbon;
                                                    
                                                    $fecha_hora = Carbon::now()->toDateTimeString();
                                                    ?>
                                                    <input type="hidden" name="fecha_hora" value="{{ $fecha_hora }}">
                                                </div>

                                                <!----User--->
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                                <!--Botones--->
                                                <div class="col-12 mt-4 text-center">
                                                    <button type="submit" class="btn btn-info" id="guardar">Realizar
                                                        venta</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal para cancelar la venta -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Advertencia</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Seguro que quieres cancelar la venta?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                            <button id="btnCancelarVenta" type="button" class="btn btn-danger"
                                                data-dismiss="modal">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
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

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function calculate() {
            var value1 = parseFloat(document.getElementById("inputTotal2").value);
            var value2 = parseFloat(document.getElementById("efectivo").value);

            if (isNaN(value1) || isNaN(value2)) {
                // Si alguno de los valores no es un número, no hace nada
                return;
            }

            // Calcula el resultado y lo muestra en input3
            var result = value2 - value1;

            document.getElementById("cambio").value = Number(result.toFixed(2));
        }
    </script>
    <script>
        var lastValue = ""; // Almacena el último valor conocido

        function checkForChanges() {
            var total = document.getElementById("total").innerHTML;

            if (total !== lastValue) {
                // Si el valor ha cambiado, lo copia y actualiza lastValue
                document.getElementById("inputTotal2").value = total;
                lastValue = total;
            }

            // Revisa nuevamente después de 500 milisegundos
            setTimeout(checkForChanges, 500);
        }

        // Comienza a revisar cambios
        checkForChanges();
    </script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#producto_id').change(mostrarValores);


            $('#btn_agregar').click(function() {
                agregarProducto();
            });

            $('#btnCancelarVenta').click(function() {
                cancelarVenta();
            });

            disableButtons();

            $('#impuesto').val(impuesto + '%');
        });

        //Variables
        let cont = 0;
        let subtotal = [];
        let sumas = 0;
        let iva = 0;
        let total = 0;

        //Constantes
        const impuesto = 12;

        function mostrarValores() {
            let dataProducto = document.getElementById('producto_id').value.split('-');
            $('#stock').val(dataProducto[1]);
            $('#precio_venta').val(dataProducto[2]);
        }

        function agregarProducto() {
            let dataProducto = document.getElementById('producto_id').value.split('-');
            //Obtener valores de los campos
            let idProducto = dataProducto[0];
            let nameProducto = $('#producto_id option:selected').text();
            let cantidad = $('#cantidad').val();
            let precioVenta = $('#precio_venta').val();
            let descuento = $('#descuento').val();
            let stock = $('#stock').val();

            if (descuento == '') {
                descuento = 0;
            }

            //Validaciones 
            //1.Para que los campos no esten vacíos
            if (idProducto != '' && cantidad != '') {

                //2. Para que los valores ingresados sean los correctos
                if (parseInt(cantidad) > 0 && (cantidad % 1 == 0) && parseFloat(descuento) >= 0) {

                    //3. Para que la cantidad no supere el stock
                    if (parseInt(cantidad) <= parseInt(stock)) {
                        //Calcular valores
                        subtotal[cont] = round(cantidad * precioVenta - descuento);
                        sumas += subtotal[cont];
                        iva = round(sumas / 100 * impuesto);
                        total = round(sumas + iva);

                        //Crear la fila
                        let fila = '<tr id="fila' + cont + '">' +
                            '<th>' + (cont + 1) + '</th>' +
                            '<td><input type="hidden" name="arrayidproducto[]" value="' + idProducto + '">' + nameProducto +
                            '</td>' +
                            '<td><input type="hidden" name="arraycantidad[]" value="' + cantidad + '">' + cantidad +
                            '</td>' +
                            '<td><input type="hidden" name="arrayprecioventa[]" value="' + precioVenta + '">' +
                            precioVenta + '</td>' +
                            '<td><input type="hidden" name="arraydescuento[]" value="' + descuento + '">' + descuento +
                            '</td>' +
                            '<td>' + subtotal[cont] + '</td>' +
                            '<td><button class="btn btn-danger" type="button" onClick="eliminarProducto(' + cont +
                            ')"><i class="fas fa-trash"></i></button></td>' +
                            '</tr>';

                        //Acciones después de añadir la fila
                        $('#tabla_detalle').append(fila);
                        limpiarCampos();
                        cont++;
                        disableButtons();

                        //Mostrar los campos calculados
                        $('#sumas').html(sumas);
                        $('#iva').html(iva);
                        $('#total').html(total);
                        $('#impuesto').val(iva);
                        $('#inputTotal').val(total);
                    } else {
                        showModal('Cantidad incorrecta');
                    }

                } else {
                    showModal('Valores incorrectos');
                }

            } else {
                showModal('Le faltan campos por llenar');
            }

        }

        function eliminarProducto(indice) {
            //Calcular valores
            sumas -= round(subtotal[indice]);
            iva = round(sumas / 100 * impuesto);
            total = round(sumas + iva);

            //Mostrar los campos calculados
            $('#sumas').html(sumas);
            $('#iva').html(iva);
            $('#total').html(total);
            $('#impuesto').val(iva);
            $('#InputTotal').val(total);

            //Eliminar el fila de la tabla
            $('#fila' + indice).remove();

            disableButtons();
        }

        function cancelarVenta() {
            //Elimar el tbody de la tabla
            $('#tabla_detalle tbody').empty();

            //Añadir una nueva fila a la tabla
            let fila = '<tr>' +
                '<th></th>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '</tr>';
            $('#tabla_detalle').append(fila);

            //Reiniciar valores de las variables
            cont = 0;
            subtotal = [];
            sumas = 0;
            iva = 0;
            total = 0;

            //Mostrar los campos calculados
            $('#sumas').html(sumas);
            $('#iva').html(iva);
            $('#total').html(total);
            $('#impuesto').val(impuesto + '%');
            $('#inputTotal').val(total);

            limpiarCampos();
            disableButtons();
        }

        function disableButtons() {
            if (total == 0) {
                $('#guardar').hide();
                $('#cancelar').hide();
            } else {
                $('#guardar').show();
                $('#cancelar').show();
            }
        }

        function limpiarCampos() {
            let select = $('#producto_id');
            select.selectpicker('val', '');
            $('#cantidad').val('');
            $('#precio_venta').val('');
            $('#descuento').val('');
            $('#stock').val('');
        }

        function showModal(message, icon = 'error') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: icon,
                title: message
            })
        }

        function round(num, decimales = 2) {
            var signo = (num >= 0 ? 1 : -1);
            num = num * signo;
            if (decimales === 0) //con 0 decimales
                return signo * Math.round(num);
            // round(x * 10 ^ decimales)
            num = num.toString().split('e');
            num = Math.round(+(num[0] + 'e' + (num[1] ? (+num[1] + decimales) : decimales)));
            // x * 10 ^ (-decimales)
            num = num.toString().split('e');
            return signo * (num[0] + 'e' + (num[1] ? (+num[1] - decimales) : -decimales));
        }
        //Fuente: https://es.stackoverflow.com/questions/48958/redondear-a-dos-decimales-cuando-sea-necesario
    </script>
@endpush
