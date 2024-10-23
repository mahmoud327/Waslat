<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Feature extends Model   implements HasMedia
{
    use HasTranslations;
    use HasFactory;
    use InteractsWithMedia;
    protected $table = "features";
    protected $guarded = ['id'];
    public $translatable = ['name'];

    public $timestamps = true;

    public function listings()
    {
        return $this->hasMany(FeatureList::class, 'feature_id');
    }

    public function getImageUrlAttribute()
    {
        return asset(optional($this->getFirstMedia('features'))->getUrl());
    }

}
