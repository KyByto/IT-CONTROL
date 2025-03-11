<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{

    // içi j'ai proteger les attributs sensibles
    protected $fillable = ['name' , 'location'];

    protected function reservations() : HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
