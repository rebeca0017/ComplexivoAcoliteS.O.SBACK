<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detallePedido()
    {
        return $this->hasMany(DetallePedido::class);
    }
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }

}

//hasta ahi