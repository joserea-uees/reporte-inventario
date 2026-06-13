<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'nombre' => 'Laptop Dell XPS',
            'descripcion' => 'Core i7 13th Gen, 16GB RAM, 512GB SSD',
            'cantidad' => 3,
            'precio' => 1250.00
        ]);

        Product::create([
            'nombre' => 'Mouse Logitech MX Master 3',
            'descripcion' => 'Inalámbrico, ergonómico',
            'cantidad' => 45,
            'precio' => 89.99
        ]);
        Product::create([
            'nombre' => 'ZDR',
            'descripcion' => 'Inalámbrico',
            'cantidad' => 100,
            'precio' => 20.00
        ]);

        Product::create([
            'nombre' => 'Teclado Mecánico Redragon',
            'descripcion' => 'RGB, switches brown',
            'cantidad' => 12,
            'precio' => 65.00
        ]);

        Product::create([
            'nombre' => 'Monitor Samsung Odyssey G5 27"',
            'descripcion' => 'Curvo, 144Hz, 2K',
            'cantidad' => 2,
            'precio' => 450.00
        ]);

        Product::create([
            'nombre' => 'SSD NVMe Kingston 1TB',
            'descripcion' => 'KC3000, PCIe 4.0',
            'cantidad' => 8,
            'precio' => 95.00
        ]);

        Product::create([
            'nombre' => 'Memoria RAM Corsair 32GB (2x16)',
            'descripcion' => 'DDR5 6000MHz',
            'cantidad' => 4,
            'precio' => 145.00
        ]);

        Product::create([
            'nombre' => 'Impresora HP LaserJet',
            'descripcion' => 'Multifuncional, WiFi',
            'cantidad' => 1,
            'precio' => 280.00
        ]);

        Product::create([
            'nombre' => 'Audífonos Sony WH-1000XM5',
            'descripcion' => 'Noise Cancelling',
            'cantidad' => 6,
            'precio' => 398.00
        ]);

        Product::create([
            'nombre' => 'Webcam Logitech C920',
            'descripcion' => '1080p Full HD',
            'cantidad' => 0,
            'precio' => 85.00
        ]);

        Product::create([
            'nombre' => 'Router TP-Link Archer AX55',
            'descripcion' => 'WiFi 6, Gigabit',
            'cantidad' => 15,
            'precio' => 95.00
        ]);
    }
}