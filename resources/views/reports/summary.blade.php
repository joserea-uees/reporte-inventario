@extends('layouts.app')

@section('content')

<h2 class="page-title">
    Dashboard Inventario
</h2>

<div class="row g-4">

    <div class="col-md-4">
        <div class="glass-card p-4">
            <i class="fa-solid fa-box fa-2x text-primary"></i>

            <div class="metric-number mt-3">
                {{ $totalProductos }}
            </div>

            <div class="metric-label">
                Productos
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="glass-card p-4">
            <i class="fa-solid fa-layer-group fa-2x text-success"></i>

            <div class="metric-number mt-3">
                {{ $stockTotal }}
            </div>

            <div class="metric-label">
                Unidades
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="glass-card p-4">
            <i class="fa-solid fa-dollar-sign fa-2x text-warning"></i>

            <div class="metric-number mt-3">
                ${{ number_format($valorTotalInventario,2) }}
            </div>

            <div class="metric-label">
                Valor Inventario
            </div>
        </div>
    </div>

</div>

<div class="glass-card p-4 mt-4">

    <h5>Información General</h5>

    <hr>

    <p>
        🏆 Producto más caro:
        <strong>{{ $productoMasCaro?->nombre }}</strong>
    </p>

    <p>
        📦 Mayor stock:
        <strong>{{ $productoMasStock?->nombre }}</strong>
    </p>

</div>

@endsection