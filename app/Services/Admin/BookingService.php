<?php

namespace App\Services\Admin;

use App\Models\Booking;

class BookingService
{

    public function destroy($id): array
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->bookingRequest()->delete();
            $booking->delete();
            return [
                'success' => true,
                'message' => translate_message('success_deleted')
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}
