<?php

namespace App\Services\Admin;

use App\Enums\BookingStatus;
use App\Mail\BookingStateMail;
use App\Models\BookingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingRequestService
{
    protected mixed $bookingId;
    protected mixed $bookingDate;

    protected string $unitTitle;
    protected string $bookingLocation;
    protected string $userEmail;
    protected string $userName;

    protected $email_setting;

    public function __construct(){

        $this->email_setting=app('settings')->getValue('email_setting','send_email');
    }
    public function destroy($id): array
    {
        try {
            $request = BookingRequest::where('id', $id)->first();
            $request->delete();
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

    public function changeStatus(Request $request): array
    {
        try {
            $booking_request = BookingRequest::with('unit', 'user')->where('id', $request->input('request_id'))->first();
            $status = $request->input('status');
            //initialize property
            $this->bookingId = $booking_request->booking_id;
            $this->bookingDate = $booking_request->booking_date;
            $this->unitTitle = $booking_request->unit->title;
            $this->bookingLocation = $booking_request->unit->address;
            $this->userEmail = $booking_request->user->email;
            $this->userName = $booking_request->user->full_name;
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

            //update status
            $booking_request->update(['status' => $status]);
            return [
                'success' => true,
                'message' => translate_message('success_updated')
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
            if($this->email_setting==='true') {
                Mail::to($this->userEmail)->send(new BookingStateMail(
                    $this->userName,
                    BookingStatus::CANCELLED->value,
                    $this->bookingId,
                    $this->bookingDate,
                    $this->unitTitle,
                    $this->bookingLocation
                ));
            }
        }


    }

    private function handleConfirmed($booking_request): void
    {
        if($this->email_setting==='true') {
            Mail::to($this->userEmail)->send(new BookingStateMail(
                $this->userName,
                BookingStatus::CONFIRMED->value,
                $this->bookingId,
                $this->bookingDate,
                $this->unitTitle,
                $this->bookingLocation
            ));
        }
    }

    private function handleRejected($booking_request): void
    {
        if($this->email_setting==='true') {
            Mail::to($this->userEmail)->send(new BookingStateMail(
                $this->userName,
                BookingStatus::REJECTED->value,
                $this->bookingId,
                $this->bookingDate,
                $this->unitTitle,
                $this->bookingLocation
            ));
        }
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
            if($this->email_setting==='true') {
                Mail::to($this->userEmail)->send(new BookingStateMail(
                    $this->userName,
                    BookingStatus::ACCEPTED->value,
                    $this->bookingId,
                    $this->bookingDate,
                    $this->unitTitle,
                    $this->bookingLocation
                ));
            }
        }


    }
}
