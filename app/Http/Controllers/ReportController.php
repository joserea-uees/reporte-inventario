<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

    // Exportar Reporte 1 a CSV
    public function exportLowStock()
    {
        $productos = Product::where('cantidad', '<', 5)
                        ->orderBy('cantidad', 'asc')
                        ->get();

        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=reporte_bajo_stock_" . date('Y-m-d') . ".csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() use($productos) {
            $file = fopen('php://output', 'w');
            
            // Forzar codificación UTF-8 para que Excel lea tildes y eñes correctamente
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Encabezados de columnas
            fputcsv($file, ['Producto', 'Descripción', 'Stock / Estado', 'Precio ($)']);

            // Insertar datos
            foreach ($productos as $p) {
                $estado = ($p->cantidad == 0) ? 'Agotado' : $p->cantidad;
                
                fputcsv($file, [
                    $p->nombre,
                    $p->descripcion ?? 'Sin descripción',
                    $estado,
                    number_format($p->precio, 2)
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
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