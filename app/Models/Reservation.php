<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['hotel_id' , 'customer_id' , 'check_in' , 'check_out'];
    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];

    protected function hotel() : BelongsTo {
        return $this->belongsTo(Hotel::class);
    }





}
