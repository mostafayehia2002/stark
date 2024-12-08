<?php

namespace App\Models;

use App\Traits\CustomizeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //

    use HasFactory,CustomizeDate;

    protected $table = 'bookings';
    protected $fillable =[
        'booking_request_id',
        'confirmed_date',
    ];

}
