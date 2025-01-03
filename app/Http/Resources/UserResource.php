<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'account_type' => $this->account_type,
            'is_active' => $this->is_active,
            'phone_code' => $this->phone_code,
            'phone' => $this->phone,
            'val_license' => $this->val_license,
            'commercial_registration_number' => $this->commercial_registration_number,
            'city_id' => $this->city_id,
            'state_id' => $this->state_id,
            'profileImage' => $this->profile_image,
          ];
    }
}
