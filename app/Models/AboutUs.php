<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class AboutUs extends Model  implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasTranslations;
    protected $guarded = ['id'];
    public $translatable = ['title', 'description'];

    public function getImageUrlAttribute()
    {
        return asset(optional($this->getFirstMedia('about-us'))->getUrl());
    }

}
