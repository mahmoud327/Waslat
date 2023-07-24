<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $table = "features";
    protected $guarded = ['id'];
    public $translatable = ['name'];

    public $timestamps = true;

    public function listings()
    {
        return $this->hasMany(FeatureList::class, 'feature_id');
    }
}
