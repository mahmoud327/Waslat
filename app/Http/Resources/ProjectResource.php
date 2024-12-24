<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "date" => $this->created_at->format('d F Y'),
            "all_images" => $this->allImages,
            "main_image" => $this->image_url,
            "plan" => $this->plan_url,

        ];
    }
}
