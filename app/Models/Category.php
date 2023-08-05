<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Category extends Model implements HasMedia
{
    use HasTranslations;
    use InteractsWithMedia;


    use HasFactory;

    public $translatable = ['title', 'description'];


    public function realEstates(){
        return $this->hasmany(RealEstate::class);
    }

    public function scopeActive($q){
      return   $q->where('active',1);

    }
    protected $guarded = ['id'];
}
