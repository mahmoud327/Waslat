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

class City extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $guarded = ['id'];
    use HasTranslations;
    public $translatable = ['name'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class,'city_id');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class,'state_id');
    }

}
