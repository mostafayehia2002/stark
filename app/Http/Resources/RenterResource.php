<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RenterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "full_name" => $this->full_name,
            "username" => $this->username,
            "phone" => $this->phone,
            "email" => $this->email,
            "type" => translate_enums($this->type),
            "address" => $this->address,
            "status" =>translate_enums($this->address),
            "created_at" => $this->created_at,
        ];
    }
}
