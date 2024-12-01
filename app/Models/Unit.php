<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $table = 'units';
    protected $fillable = [
        'user_id',
        'title',
        'type',
        'price',
        'description',
        'address',
        'area',
        'number_bedroom',
        'number_bathroom',
        'status'
    ];
    protected $with = ['features', 'owner'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function features()
    {
        return $this->belongsToMany(Feature::class, 'unit_features');
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
