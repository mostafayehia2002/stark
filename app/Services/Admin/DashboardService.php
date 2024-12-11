<?php

namespace App\Services\Admin;

use App\Models\Booking;
use App\Models\BookingRequest;
use App\Models\ContactUs;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class DashboardService
{
    public function getDashboardData()
    {
        return Cache::remember('dashboard_data', 15, function() {
            return [
                'ownerCount' => User::where('type', 'owner')->count(),
                'renterCount' => User::where('type', 'renter')->count(),
                'adminCount' => User::where('type', 'admin')->count(),
                'totalUsers' => User::count(),
                'unitCount'=>Unit::get()->count(),
                'bookingRequestCount'=>BookingRequest::get()->count(),
                'recentUsers' => User::latest()->take(10)->get(),
                'requests'=>BookingRequest::latest()->take(10)->get(),
                'messagesCount'=>ContactUs::get()->count(),
                'messages'=>ContactUs::latest()->take(10)->get(),
                'bookingCount'=>Booking::get()->count(),
            ];
        });
    }


}
