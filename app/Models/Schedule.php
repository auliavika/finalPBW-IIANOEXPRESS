<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id',
        'from_city',
        'to_city',
        'departure_date',
        'departure_time',
        'seat_capacity',
        'price',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function fromCity()
    {
        return $this->belongsTo(City::class, 'from_city');
    }

    public function toCity()
    {
        return $this->belongsTo(City::class, 'to_city');
    }
}