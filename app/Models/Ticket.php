<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'schedule_id',
        'name',
        'email',
        'alamat',
        'phone',
        'seat',
        'total_price',
        'status',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
