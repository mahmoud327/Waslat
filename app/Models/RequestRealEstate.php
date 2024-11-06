<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class RequestRealEstate extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $guarded = ['id'];
    protected $table="real_estate_requests";

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'real_estate_request_feature', 'real_estate_request_id', 'feature_id');
    }

    public function getStartDate()
    {
        if ($this->start_date > now()) {
            return 'قادم';
        } else if ($this->start_date == now()) {
            return 'جارى';
        } else {
            return 'منتهى';
        }
    }

    public function realEstateFeatureLists()
    {
        return $this->hasMany(
            RealEstateFeature::class,
        );
    }


    public function scopeFilter($query, $filters)
    {
        return $query
            ->when($filters['type'] ?? null, function ($query, $type) {
                $query->where('type', $type);
            })
            ->when(($filters['price_from'] ?? null) &&
             ($filters['price_to'] ?? null), function ($query) use ($filters) {
                $query->whereBetween('price', [$filters['price_from'], $filters['price_to']]);
            })
            ->when($filters['phone'] ?? null, function ($query, $phone) {
                $query->where('phone', 'like', '%' . $phone . '%');
            })
            ->when($filters['number_of_rooms'] ?? null, function ($query, $rooms) {
                $query->where('number_of_rooms', $rooms);
            })
            ->when($filters['bathrooms_of_rooms'] ?? null, function ($query, $bathrooms) {
                $query->where('bathrooms_of_rooms', $bathrooms);
            })
            ->when($filters['hall_number'] ?? null, function ($query, $hall) {
                $query->where('hall_number', $hall);
            })
            ->when($filters['number_of_council_rooms'] ?? null, function ($query, $councilRooms) {
                $query->where('number_of_council_rooms', $councilRooms);
            })
            ->when($filters['land_area'] ?? null, function ($query, $landArea) {
                $query->where('land_area', 'like', '%' . $landArea . '%');
            })
            ->when($filters['street'] ?? null, function ($query, $street) {
                $query->where('street', 'like', '%' . $street . '%');
            })
            ->when($filters['number_of_streets'] ?? null, function ($query, $streets) {
                $query->where('number_of_streets', $streets);
            })
            ->when($filters['street_area'] ?? null, function ($query, $streetArea) {
                $query->where('street_area', $streetArea);
            })
            ->when($filters['street_facing'] ?? null, function ($query, $streetFacing) {
                $query->where('street_facing', 'like', '%' . $streetFacing . '%');
            })
            ->when($filters['electricity'] ?? null, function ($query, $electricity) {
                $query->where('electricity', $electricity);
            })
            ->when($filters['water'] ?? null, function ($query, $water) {
                $query->where('water', $water);
            })
            ->when($filters['Depth'] ?? null, function ($query, $depth) {
                $query->where('Depth', 'like', '%' . $depth . '%');
            })
            ->when($filters['features_facilities'] ?? null, function ($query, $features) {
                $query->where('features_facilities', 'like', '%' . $features . '%');
            })

            ->when($filters['whatsup'] ?? null, function ($query, $whatsup) {
                $query->where('whatsup', 'like', '%' . $whatsup . '%');
            })
            ->when($filters['email'] ?? null, function ($query, $email) {
                $query->where('email', 'like', '%' . $email . '%');
            })
            ->when($filters['marketer_name'] ?? null, function ($query, $marketerName) {
                $query->where('marketer_name', 'like', '%' . $marketerName . '%');
            })
            ->when($filters['license_number'] ?? null, function ($query, $licenseNumber) {
                $query->where('license_number', 'like', '%' . $licenseNumber . '%');
            })
            ->when($filters['city_id'] ?? null, function ($query, $cityId) {
                $query->where('city_id', $cityId);
            })
            ->when($filters['state_id'] ?? null, function ($query, $cityId) {
                $query->whereRelation('city','state_id', $cityId);
            })
            ->when($filters['category_id'] ?? null, function ($query, $categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->when($filters['user_id'] ?? null, function ($query, $userId) {
                $query->where('user_id', $userId);
            });
    }

    // App\Models\Auction.php

public function scopeActive($query)
{
    return $query->where('is_active', true);
}


}
