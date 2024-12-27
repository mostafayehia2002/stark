<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingRequestDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'booking_id' => $this->booking_id,
            'booking_date' => $this->booking_date,
            'status' => translate_enums($this->status),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'renter'=>new RenterResource($this->whenLoaded('user')),
            'owner'=>new OwnerResource($this->whenLoaded('owner')),
            'unit'=> new UnitResource($this->whenLoaded('unit')),
        ];
    }
}
