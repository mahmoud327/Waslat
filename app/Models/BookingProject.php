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


class BookingProject extends Model implements HasMedia
{


    use HasTranslations;
    use InteractsWithMedia;
    protected $guarded = ['id'];
    protected $table = "booking_project";


    /*
     * ----------------------------------------------------------------- *
     * --------------------------- Acessores --------------------------- *
     * ----------------------------------------------------------------- *
     */


    public function getImageUrlAttribute()
    {
        return asset(optional($this->getFirstMedia('projects/main_image'))->getUrl());
    }
    public function getPlanUrlAttribute()
    {
        return asset(optional($this->getFirstMedia('plans'))->getUrl());
    }

    public function getAllImagesAttribute()
    {
        $mainImage = $this->getFirstMedia('projects/main_image');
        $images = $this->getMedia('projects')->map(function ($media) {
            return [
                'id' => $media->id,
                'original' => url('storage/projects/' . $media->file_name),
            ];
        });

        if ($mainImage) {
            $images->prepend([
                'id' => $mainImage->id,
                'original' => $mainImage->getUrl(),
            ]);
        }

        return $images;
    }


}
