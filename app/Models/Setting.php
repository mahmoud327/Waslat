<?php

namespace App\Models;

use App\Http\Resources\Core\MediaCenterResource;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
class Setting extends Model  implements HasMedia {
    use HasTranslations;
    use InteractsWithMedia;
    public $translatable = ['about_us','description','title'];
    protected $guarded = ['id'];
    protected $table = "settings";

    public function getImageUrlAttribute()
    {
        return asset(optional($this->getFirstMedia('image_app'))->getUrl());
    }

}
