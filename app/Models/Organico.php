<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organico extends Model
{
    protected $fillable = [
        'nombre','precio','stock','fecha_cosecha','descripcion'
    ];
    
public function categoria()
{
    return $this->belongsTo(Categoria::class);
}

    
}

