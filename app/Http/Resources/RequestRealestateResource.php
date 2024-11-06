<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestRealestateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'city_id' => $this->city_id,
            "city"=>CityResource::make($this->whenLoaded('city')),
            "state"=>StateResource::make($this->whenLoaded('state')),
            "category"=>CategoryResource::make($this->whenLoaded('category')),
            'state_id' => $this->state_id,
            'category_id' => $this->category_id,
            'number_of_rooms' => $this->number_of_rooms,
            'land_area' => $this->land_area,
            'price_from' => $this->price_from,
            'price_to' => $this->price_to,
            'note' => $this->note,
            "code"=>$this->code,
            'created_at' => $this->created_at ? $this->created_at->format('y-m-d') : null, // Format created_at
            'bathrooms_of_rooms' => $this->bathrooms_of_rooms,
        ];
    }
}
