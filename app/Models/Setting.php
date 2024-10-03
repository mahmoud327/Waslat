<?php

namespace App\Models;

use App\Http\Resources\Core\MediaCenterResource;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
class Setting extends Model {
    use HasTranslations;
    public $translatable = ['about_us'];
    protected $guarded = ['id'];
    protected $table = "settings";

}
