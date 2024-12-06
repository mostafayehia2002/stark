<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    //

    use HasFactory;

    protected $table = 'bookings';
    protected $fillable =[
        'booking_request_id',
        'confirmed_date',
    ];

}
