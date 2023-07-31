<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cron\ByClick;
use App\Models\Cron\ByTime;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Banner extends Model implements HasMedia
{

    use HasTranslations;
    use InteractsWithMedia;

    public $translatable = ['title', 'description'];
    protected $guarded = ['id'];
    protected $table = "banners";
}
