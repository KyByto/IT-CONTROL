<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{

    use HasFactory;
    // içi j'ai proteger les attributs sensibles
    protected $fillable = ['name' , 'location'];

    public function reservations() : HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
