<?php

namespace App\Services\Admin;

use App\Enums\BookingStatus;
use App\Models\BookingRequest;
use Illuminate\Http\Request;

class BookingRequestService
{
    public function destroy($id): array
    {
        try {
            $request = BookingRequest::where('id', $id)->first();
            $request->delete();
            return [
                'success' => true,
                'message' => 'Booking request has been deleted'
            ];
        } catch (\Exception $exception) {

            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function changeStatus(Request $request): array
    {
        try {
            $booking_request = BookingRequest::where('id', $request->input('request_id'))->first();
            $status = $request->input('status');
            $statusActions = [
                BookingStatus::PENDING->value => function () use ($booking_request) {
                    $this->handlePending($booking_request);
                },
                BookingStatus::ACCEPTED->value => function () use ($booking_request) {
                    $this->handleAccepted($booking_request);
                },
                BookingStatus::REJECTED->value => function () use ($booking_request) {
                    $this->handleRejected($booking_request);
                },
                BookingStatus::CONFIRMED->value => function () use ($booking_request) {
                    $this->handleConfirmed($booking_request);
                },
                BookingStatus::CANCELLED->value => function () use ($booking_request) {
                    $this->handleCancelled($booking_request);
                },
            ];

            if (isset($statusActions[$status])) {
                $statusActions[$status]();
            }
            $booking_request->update(['status' => $status]);
            return [
                'success' => true,
                'message' => 'Booking request has been updated'
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    private function handlePending($booking_request)
    {

    }

    private function handleCancelled($booking_request): void
    {

        $booking_request->booking()->delete();
    }

    private function handleConfirmed($booking_request)
    {

    }

    private function handleRejected($booking_request)
    {

    }

    private function handleAccepted($booking_request): void
    {
       if(!$booking_request->unit->is_booked){

           $booking_request->booking()->create([
               'confirmed_date' => now()
           ]);
           $booking_request->unit()->update([
               'is_booked' => true
           ]);
       }



    }
}
