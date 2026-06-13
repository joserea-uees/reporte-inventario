@extends('layouts.app')

@section('content')

<h2 class="page-title">
    Top Productos Más Valiosos
</h2>

<div class="glass-card p-4 table-modern">

<table class="table align-middle">

    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Valor Total</th>
        </tr>
    </thead>

    <tbody>

        @foreach($productos as $p)

        <tr>

            <td>
                <strong>{{ $p->nombre }}</strong>
            </td>

            <td>{{ $p->cantidad }}</td>

            <td>
                ${{ number_format($p->precio,2) }}
            </td>

            <td>
                <span class="fw-bold text-success">
                    ${{ number_format($p->valor_total,2) }}
                </span>
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</div>

@endsection