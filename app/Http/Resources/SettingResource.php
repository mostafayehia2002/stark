<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'general' => $this->generalSettings($this->resource->get('general', collect())),
            'social_media' => $this->socialMediaLinks($this->resource->get('social_media', collect())),
        ];
    }

    protected function socialMediaLinks($type)
    {
        return $type->map(function ($link) {
            return $link->only(['id', 'key', 'value']);
        });
    }


    protected function generalSettings($type)
    {
        return $type->map(function ($setting) {
            if ($setting->key === 'site_logo' && $setting->input_type === 'file') {
                $setting->value = asset('storage/uploads/settings/' . $setting->value);
            }

            return $setting->only(['id', 'key', 'value']);
        });
    }

}
