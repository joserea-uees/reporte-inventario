<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // Reporte 1: Productos con bajo stock (< 5)
    public function lowStock()
    {
        $productos = Product::where('cantidad', '<', 5)
                        ->orderBy('cantidad', 'asc')
                        ->get();

        return view('reports.low-stock', compact('productos'));
    }

    // Reporte 2: Top 5 productos con mayor valor en inventario
    public function topValue()
    {
        $productos = Product::selectRaw('*, (cantidad * precio) as valor_total')
                        ->orderBy('valor_total', 'desc')
                        ->limit(5)
                        ->get();

        return view('reports.top-value', compact('productos'));
    }

    // Reporte 3: Resumen General
    public function summary()
    {
        $totalProductos = Product::count();
        $stockTotal = Product::sum('cantidad');
        $valorTotalInventario = Product::sum(DB::raw('cantidad * precio'));
        $productoMasCaro = Product::orderBy('precio', 'desc')->first();
        $productoMasStock = Product::orderBy('cantidad', 'desc')->first();

        return view('reports.summary', compact(
            'totalProductos', 
            'stockTotal', 
            'valorTotalInventario',
            'productoMasCaro',
            'productoMasStock'
        ));
    }

    // API JSON (útil para el Estudiante 1)
    public function apiLowStock()
    {
        return response()->json(Product::where('cantidad', '<', 5)->get());
    }

    public function apiAllProducts()
    {
        return response()->json(Product::all());
    }
}