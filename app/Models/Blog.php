<?php

namespace App\Models;

use App\Http\Resources\Core\MediaCenterResource;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cron\ByClick;
use App\Models\Cron\ByTime;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;


class Blog extends Model implements HasMedia
{


    use HasTranslations;
    use InteractsWithMedia;
    public $translatable = ['title', 'description'];
    protected $guarded = ['id'];
    protected $table = "blogs";
    protected $casts = [
        'videos' => 'array',  // Ensure it's cast as an array
    ];


    /*
     * ----------------------------------------------------------------- *
     * --------------------------- Acessores --------------------------- *
     * ----------------------------------------------------------------- *
     */


    public function getImageUrlAttribute()
    {
        return asset(optional($this->getFirstMedia('blogs'))->getUrl());
    }



}
