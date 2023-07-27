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

class Auction extends Model implements HasMedia
{
    use InteractsWithMedia;

    use HasFactory;

    protected $guarded = ['id'];
    use HasTranslations;
    public $translatable = ['name', 'description'];


    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class, 'user_id');
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
}
