<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        "full_name"=>$this->full_name,
        "username"=>$this->username,
        "phone"=>$this->phone,
        "email"=>$this->email,
        "type"=>$this->type,
        "business_name"=>$this->business_name,
        "business_license"=>$this->business_license,
        "address"=>$this->address,
        "status"=> $this->address,
        "created_at"=>$this->created_at,
        ];
    }
}
