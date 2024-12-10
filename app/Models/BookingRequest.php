<?php

namespace App\Models;

use App\Enums\BookingStatus;
use App\Enums\UserType;
use App\Traits\CustomizeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BookingRequest extends Model
{
    use HasFactory, CustomizeDate;

    protected $table = 'booking_requests';
    protected $primaryKey = 'booking_id';
    protected $fillable = ['booking_id', 'user_id', 'unit_id', 'booking_date', 'status'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class,'booking_request_id');
    }


    public function owner()
    {
        return $this->hasOneThrough(
            User::class,
            Unit::class,
            'id',
            'id',
            'unit_id',
            'user_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->booking_id) {
                $model->booking_id =rand(1000000000, 9999999999);
            }
        });
    }


    public function getStatusAttributes(string $status): array
    {
        // Define the mapping of status colors and labels
        $statusConfig = [
            BookingStatus::PENDING->value => ['color' => 'warning', 'label' => 'Pending'],
            BookingStatus::CONFIRMED->value => ['color' => 'success', 'label' => 'Confirmed'],
            BookingStatus::REJECTED->value => ['color' => 'danger', 'label' => 'Rejected'],
            BookingStatus::ACCEPTED->value => ['color' => 'primary', 'label' => 'Accepted'],
            BookingStatus::CANCELLED->value => ['color' => 'secondary', 'label' => 'Cancelled'],
        ];

        // Return the status configuration for the given status or default values
        return $statusConfig[$status] ?? ['color' => 'secondary', 'label' => ucfirst($status)];
    }


}
