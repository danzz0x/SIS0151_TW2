<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'cantidad',
        'precio',
        'descripcion',
        'imagen',
        'disponible',
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}
