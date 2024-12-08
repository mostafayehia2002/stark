<?php

namespace App\Models;

use App\Traits\CustomizeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable,HasRoles,CustomizeDate,HasFactory;

    protected $fillable = [
        'full_name',
        'username',
        'email',
        'password',
        'phone',
        'type',
        'business_name',
        'business_license',
        'address',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function units()
    {
        return $this->hasMany(Unit::class);
    }


    public function booking_requests()
    {
        return $this->hasMany(BookingRequest::class);
    }

    public function favorites(){

        return $this->hasMany(Favorite::class,'user_id');
    }

}
