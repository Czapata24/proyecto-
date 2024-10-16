<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['dish_id', 'date', 'time', 'user_name']; // Agrega los campos que llenas

    // Relación con el modelo Dish
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}
