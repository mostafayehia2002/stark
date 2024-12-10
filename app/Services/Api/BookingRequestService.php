<?php

namespace App\Services\Api;

use App\Enums\BookingStatus;
use App\Http\Requests\BookingUnitRequest;
use App\Http\Requests\ChangeStatusRequest;
use App\Models\BookingRequest;

class BookingRequestService
{


    public function getAllBookingRequests(): array
    {
        $user = auth()->user();
        $booking_requests = BookingRequest::with(['unit', 'owner' => function ($query) use ($user) {
            $query->where('users.id', $user->id);
        }])->orderBy('created_at', 'DESC')->paginate(15);
        if (!$booking_requests->isEmpty()) {
            return [
                'success' => true,
                'data' => $booking_requests,
            ];
        }
        return [
            'success' => false,
            'message' => 'No bookings requests found',
        ];

    }

    public function details($id): array
    {
        $user = auth()->user();
        $request = BookingRequest::with(['user', 'unit', 'owner' => function ($query) use ($user) {

            $query->where('users.id', $user->id);

        }])->where('booking_id', $id)->first();
        if ($request) {
            return [
                'success' => true,
                'data' => $request,
            ];
        }
        return [
            'success' => false,
            'message' => 'No bookings requests found',
        ];
    }

    public function destroy($id)
    {
        $request = BookingRequest::whereHas('owner', function ($query) {
            $query->where('users.id', auth()->id());
        })->where('booking_id', $id)->first();
        if ($request) {
            $request->delete();
            return [
                'success' => true,
                'message' => 'Booking request has been deleted',
            ];
        }
        return [
            'success' => false,
            'message' => 'No bookings requests found',
        ];
    }

    public function store(BookingUnitRequest $request)
    {
        $user = auth()->user();
        $request = $user->booking_requests()->firstOrCreate([
            'unit_id' => $request->input('unit_id'),
            'booking_date' => $request->input('booking_date'),
        ]);
        if ($request->wasRecentlyCreated) {
            return [
                'success' => true,
                'status' => 201,
                'message' => 'Successfully Send Request of Booking Unit',
            ];
        }
        return [
            'success' => true,
            'status' => 200,
            'message' => 'Unit is already in Booking From You',

        ];

    }

    public function changeStatus(ChangeStatusRequest $request): array
    {
        try {
            $booking_request = BookingRequest::whereHas('owner', function ($query) {
                $query->where('users.id', auth()->id());
            })->where('booking_id', $request->input('booking_id'))->first();
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
        if ($booking_request->unit->is_booked) {
            $booking_request->booking()->delete();
            $booking_request->unit()->update([
                'is_booked' => false
            ]);
        }


    }

    private function handleConfirmed($booking_request)
    {

    }

    private function handleRejected($booking_request)
    {

    }

    private function handleAccepted($booking_request)
    {
        if (!$booking_request->unit->is_booked) {
            $booking_request->booking()->firstOrCreate([
                'confirmed_date' => now()
            ]);
            $booking_request->unit()->update([
                'is_booked' => true
            ]);
        }

    }
}
