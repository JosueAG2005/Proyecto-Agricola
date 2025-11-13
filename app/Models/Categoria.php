<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    // 👇 Relación inversa correctamente colocada dentro de la clase
    public function ganados()
    {
        return $this->hasMany(Ganado::class);
    }
    public function maquinarias()
{
    return $this->hasMany(Maquinaria::class, 'categoria_id');
}

}
