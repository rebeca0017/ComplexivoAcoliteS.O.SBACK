<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    use HasFactory;
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}
