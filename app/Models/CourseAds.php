<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseAds extends BaseModel
{
  protected $connection = 'main';
    const COURSES_ADS="Course/CourseAds";
    use HasFactory;
    protected $fillable = [
            // 'title',
            // 'description' ,
            'img' ,
            // 'sub_title',
            'fee' ,
            // 'outlines' ,
            'start_date' ,
            'end_date',
            'houres' ,
            'lang' ,
            'code' ,
            'change_active_date' ,
            'category_id',
            'venue_id'

    ];
    
 
    public $translatedAttributes = ['title', 'description', 'sub_title', 'outlines' ,];


public function category()
{
  return $this->belongsTo(Category::class,'category_id');
}
public function venue()
{
  return $this->belongsTo(Venue::class,'venue_id');
}

//  public function translations(): HasMany
//     {
//       return $this->hasMany(CourseAdsTranslation::class,'course_ads_id');
//     }
}

