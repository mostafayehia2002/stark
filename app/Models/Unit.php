<?php

namespace App\Models;

use App\Traits\CustomizeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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
        'currency',
        'description',
        'address',
        'area',
        'number_bedroom',
        'number_bathroom',
        'is_booked',
        'status'
    ];
    protected $with = ['features','images'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function features()
    {
        return $this->belongsToMany(Feature::class, 'unit_features');
    }


    public function booking_requests()
    {
        return $this->hasMany(BookingRequest::class);
    }

    public function images()
    {
        return $this->morphMany(Media::class, 'mediable');
    }



    public function isAcceptable(): bool
    {
        return $this->status === \App\Enums\UnitStatus::PENDING->value || $this->status === \App\Enums\UnitStatus::REJECTED->value;
    }
    public function getNextStatus(): string
    {
        return $this->isAcceptable() ? 'accept' : 'reject';
    }

    public function getButtonClass(): string
    {
        return $this->isAcceptable() ? 'btn-success' : 'btn-danger';
    }


    public function translate_type(): string
    {
        return translate_enums($this->type);
    }

    public function translate_status(): string
    {
        return translate_enums($this->status);
    }


}
