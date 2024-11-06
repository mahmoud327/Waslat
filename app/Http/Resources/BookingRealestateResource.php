<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingRealestateResource extends JsonResource
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
            'date' => $this->date,
            'note' => $this->note,
            "code"=>$this->code,
            "status"=>null,
            'created_at' => $this->created_at ? $this->created_at->format('y-m-d') : null, // Format created_at
        ];
    }
}
