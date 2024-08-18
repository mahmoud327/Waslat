<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'app_logo' => $this->app_logo_image,
            'app_favicon' => $this->app_favicon_image,
            'map_key' => $this->map_key,
            'secret_key' => $this->secret_key,
            'minimum_deposit_amount' => $this->minimum_deposit_amount,
            'minimum_withdrawal_amount' => $this->minimum_withdrawal_amount,
            'referral_amount' => $this->referral_amount,
            'enable_otp_trip_start' => $this->enable_otp_trip_start,
            'delivery_distance' => $this->delivery_distance,
            'radius' => $this->radius,
            'map_type' => $this->map_type,
            'driver_location_update' => $this->driver_location_update,
            'contact_us_subject' => $this->contact_us_subject,
            'privacy_policy' => $this->privacy_policy,
            'terms_and_conditions' => $this->terms_and_conditions,
            'is_enabled' => $this->is_enabled,
            'type' => $this->type,
            'amount' => $this->amount,
            'contact_us_email' => $this->contact_us_emal, // corrected typo
            'contact_us_phone_number' => $this->contact_us_phone_number,
            'contact_us_address' => $this->contact_us_address,
            'support_url' => $this->support_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
