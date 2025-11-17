<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatoSanitario extends Model
{
    protected $table = 'datos_sanitarios';

    protected $fillable = [
        'ganado_id',
        'vacuna',
        'tratamiento',
        'medicamento',
        'fecha_aplicacion',
        'proxima_fecha',
        'veterinario',
        'observaciones'
    ];

    public function ganado()
    {
        return $this->belongsTo(Ganado::class);
    }
}
