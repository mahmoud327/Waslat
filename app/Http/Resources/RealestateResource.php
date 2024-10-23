<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class RealestateResource extends JsonResource
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
            'type' => $this->type,
            'price' => $this->price,
            "name"=>$this->name,
            "videos"=>$this->videos,
            'phone' => $this->phone,
            'number_of_rooms' => $this->number_of_rooms,
            'bathrooms_of_rooms' => $this->bathrooms_of_rooms,
            'hall_number' => $this->hall_number,
            'number_of_council_rooms' => $this->number_of_council_rooms,
            'land_area' => $this->land_area,
            'street' => $this->street,
            'number_of_streets' => $this->number_of_streets,
            'street_area' => $this->street_area,
            'street_facing' => $this->street_facing,
            'electricity' => $this->electricity,
            'water' => $this->water,
            'depth' => $this->depth,
            'features_facilities' => $this->features_facilities,
            "features"=>FeatureReource::collection($this->features??[]),
            'description' => $this->description,
            'real_estate_characteristics' => $this->real_estate_characteristics,
            'whatsup' => $this->whatsup,
            'email' => $this->email,
            'marketer_name' => $this->marketer_name,
            'license_number' => $this->license_number,
            'city_id' => $this->city_id,
            "uniqu_code"=>$this->uniqu_code,
            "date" => $this->created_at->format('Y-m-d'), // Returns only the date
            "time" => $this->created_at->format('H:i:s'), // Returns only the time
            "city"=>CityResource::make($this->whenLoaded('city')),
            "category"=>CategoryResource::make($this->whenLoaded('category')),
            'category_id' => $this->category_id,
            'images' => $this->getMedia('images')->map->getUrl(), // Assuming you're using Spatie's media library
             'plan' => $this->getFirstMediaUrl('plans'), // Get the URL of the first (and in this case, the only) image in the 'plan' collection
        ];
    }
}
