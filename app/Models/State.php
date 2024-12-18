<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class State extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = ['id'];
    public $translatable = ['name','title'];
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class,'state_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class,'country_id');
    }

}
