<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
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
            'title' => $this->title,
            'price' => $this->price,
            'currency' => $this->currency,
            'address' => $this->address,
            'type'=> translate_enums($this->type),
            'area' => $this->area,
            'number_bedroom' => $this->number_bedroom,
            'number_bathroom' => $this->number_bathroom,
            'is_booked' => $this->is_booked,
            'status' => translate_enums($this->status),
            'images' => ImageResource::collection($this->images),
            'features' => FeatureResource::collection($this->features),
        ];
    }
}
