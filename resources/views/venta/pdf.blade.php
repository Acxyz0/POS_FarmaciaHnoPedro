<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Farmacia Hno Pedro | Reporte</title>
</head>

<body>
    <div class="text-teal">
        <h1>Reporte de Ventas</h1>
    </div>
    <br>
    <table class="table table-auto">
        <thead class="bg-info">
            <tr>
                <th>Comprobante</th>
                <th>Cliente</th>
                <th>Fecha y hora</th>
                <th>Vendedor</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $item)
                <tr>
                    <td>
                        <p class="fw-semibold mb-1">{{ $item->comprobante->tipo_comprobante }}</p>
                        <p class="text-muted mb-0">{{ $item->numero_comprobante }}</p>
                    </td>
                    <td>
                        <p class="fw-semibold mb-1">{{ ucfirst($item->cliente->persona->tipo_persona) }}</p>
                        <p class="text-muted mb-0">{{ $item->cliente->persona->razon_social }}</p>
                    </td>
                    <td>
                        <div class="row-not-space">
                            <p class="fw-semibold mb-1"><span class="m-1"><i
                                        class="fas fa-calendar"></i></span>{{ \Carbon\Carbon::parse($item->fecha_hora)->format('d-m-Y') }}
                            </p>
                            <p class="fw-semibold mb-0"><span class="m-1"><i
                                        class="fas fa-clock"></i></span>{{ \Carbon\Carbon::parse($item->fecha_hora)->format('H:i') }}
                            </p>
                        </div>
                    </td>
                    <td>
                        {{ $item->user->name }}
                    </td>
                    <td>
                        Q. {{ $item->total }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>




