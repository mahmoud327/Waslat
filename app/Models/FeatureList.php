<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\Translatable\HasTranslations;

class FeatureList  extends Model
{
    use HasTranslations;

    use HasFactory;
    protected $table = 'feature_lists';
    protected $fillable  = ['name'];
    public $translatable = ['name'];

    public $timestamps = true;
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
