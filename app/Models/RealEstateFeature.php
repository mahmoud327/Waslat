<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\Translatable\HasTranslations;

class RealEstateFeature  extends Model
{
   protected $table='real_estate_features';

   protected $fillable  = ['feature_id','feature_list_id'];

}
