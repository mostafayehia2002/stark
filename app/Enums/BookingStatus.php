<?php

namespace App\Enums;

enum BookingStatus: string
{
    // When the user sends a booking request (initial status)
    case PENDING = 'pending';

    // When the owner confirms the requested booking date
    case CONFIRMED = 'confirmed';

    // When the owner rejects the requested booking date
    case REJECTED = 'rejected';

    // When the owner accepts the booking request fully with the renter
    case ACCEPTED = 'accepted';

    // When the owner or renter cancels the booking request
    case CANCELLED = 'cancelled';
}
