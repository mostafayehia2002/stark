<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'type' => $this->type,
            'price' => $this->price,
            'currency' => $this->currency,
            'description' => $this->description,
            'address' => $this->address,
            'area' => $this->area,
            'number_bedroom' => $this->number_bedroom,
            'number_bathroom' => $this->number_bathroom,
            'is_booked' => $this->is_booked,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
             'images' => ImageResource::collection($this->images),
            'features' => FeatureResource::collection($this->features),
            'owner' => new OwnerResource($this->owner),

        ];
    }
}
