<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('reportes')->group(function () {
    Route::get('/bajo-stock', [ReportController::class, 'lowStock'])->name('reports.low-stock');
    Route::get('/bajo-stock/exportar', [ReportController::class, 'exportLowStock'])->name('reports.low-stock.export');
    Route::get('/top-valor', [ReportController::class, 'topValue'])->name('reports.top-value');
    Route::get('/resumen', [ReportController::class, 'summary'])->name('reports.summary');
});

// Rutas API (para el otro estudiante)
Route::prefix('api')->group(function () {
    Route::get('/bajo-stock', [ReportController::class, 'apiLowStock']);
    Route::get('/productos', [ReportController::class, 'apiAllProducts']);
});