<?php

namespace App\Models;

use App\Traits\CustomizeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory ,CustomizeDate;
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



    public function isAcceptable(): bool
    {
        return $this->status === \App\Enums\UnitStatus::PENDING->value || $this->status === \App\Enums\UnitStatus::REJECTED->value;
    }
    public function getNextStatus(): string
    {
        return $this->isAcceptable() ? 'ACCEPT' : 'REJECT';
    }

    public function getButtonClass(): string
    {
        return $this->isAcceptable() ? 'btn-success' : 'btn-danger';
    }
}
