@extends('layouts.app')

@section('content')

<h2 class="page-title">
    Productos con Bajo Stock
</h2>

<div class="glass-card p-4 table-modern">

<table class="table align-middle">

    <thead>
        <tr>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Precio</th>
        </tr>
    </thead>

    <tbody>

        @foreach($productos as $p)

        <tr>

            <td>
                <strong>{{ $p->nombre }}</strong>
            </td>

            <td>{{ $p->descripcion }}</td>

            <td>

                @if($p->cantidad == 0)

                    <span class="badge bg-danger">
                        Agotado
                    </span>

                @else

                    <span class="badge bg-warning text-dark">
                        {{ $p->cantidad }}
                    </span>

                @endif

            </td>

            <td>
                ${{ number_format($p->precio,2) }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</div>

@endsection