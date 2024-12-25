<?php

namespace App\Services\Api;

use App\Enums\BookingStatus;
use App\Enums\UnitType;
use App\Enums\UserType;
use App\Http\Requests\BookingUnitRequest;
use App\Http\Requests\ChangeStatusRequest;
use App\Models\BookingRequest;

class BookingRequestService
{


    public function getAllBookingRequests(): array
    {
        $user = auth()->user();
        $booking_requests = BookingRequest::with('unit', 'owner')
            ->when($user->type === UserType::OWNER->value, function ($query) use ($user) {
                $query->whereHas('owner', function ($q) use ($user) {
                    $q->where('users.id', $user->id);
                });
            })
            ->when($user->type === UserType::RENTER->value, function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->orderBy('created_at', 'DESC')->paginate(15);
        if (!$booking_requests->isEmpty()) {
            return [
                'success' => true,
                'data' => $booking_requests,
            ];
        }
        return [
            'success' => false,
            'message' =>translate_message('no_data_found'),
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
            'message' =>translate_message('no_data_found'),
        ];
    }

    public function destroy($id)
    {
        $user = auth()->user();
        $request = BookingRequest::when($user->type === UserType::OWNER->value, function ($query) use ($user) {
            $query->whereHas('owner', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            });
        })->when($user->type === UserType::RENTER->value, function ($query) use ($user) {

            $query->where('user_id', $user->id);
        })->where('booking_id', $id)->first();

        if ($request) {
            $request->delete();
            return [
                'success' => true,
                'message' => translate_message('success_deleted'),
            ];
        }
        return [
            'success' => false,
            'message' => translate_message('no_data_found'),
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
                'message' => translate_message('success_send_request'),
            ];
        }
        return [
            'success' => true,
            'status' => 200,
            'message' => translate_message('unit_already_booking'),

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
                'message' => translate_message('success_updated'),
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

    private function handleAccepted($booking_request): void
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
