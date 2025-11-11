<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo',
        'edad',
        'peso',
        'sexo',
        'descripcion',
        'precio',
        'imagen',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}

