<?php

namespace App\Models;

use App\Traits\CustomizeDate;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable,HasRoles,CustomizeDate;

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

//    public function profiles()
//    {
//        return $this->hasMany(Profile::class);
//    }

//    public function renterProfile()
//    {
//        return $this->hasOne(Profile::class)->where('type', 'renter');
//    }

//    public function ownerProfile()
//    {
//        return $this->hasOne(Profile::class)->where('type', 'owner');
//    }

//    public function profile()
//    {
//        // Get the current profile based on requested type
//        $type = request()->type ?? request()->route('type') ?? 'renter';
//        return $this->hasOne(Profile::class)->where('type', $type);
//    }
}
