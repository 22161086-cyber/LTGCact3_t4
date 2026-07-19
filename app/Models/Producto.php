<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- Agrega esta importación
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory; // <-- Agrega esta línea justo aquí dentro de la clase

    protected $fillable = [
        'categoria_id',
        'nombre',
        'descripcion',
        'precio',
        'stock',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}