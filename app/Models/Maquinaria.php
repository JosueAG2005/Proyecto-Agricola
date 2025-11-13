<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    protected $fillable = [
        'nombre','tipo','marca','modelo','precio_dia','estado','descripcion'
    ];
     public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}

