<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nombre de la tabla: products
    protected $table = 'products';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'cantidad',
        'precio',
    ];

    // Opcional: Si quieres proteger algunos campos
    // protected $guarded = [];

    // Casts (para que Laravel trate correctamente los tipos)
    protected $casts = [
        'precio'    => 'decimal:2',
        'cantidad'  => 'integer',
    ];

    // Accesores (opcionales pero útiles)
    public function getValorTotalAttribute()
    {
        return $this->cantidad * $this->precio;
    }

    // Scope para bajo stock
    public function scopeLowStock($query)
    {
        return $query->where('cantidad', '<', 5);
    }
}