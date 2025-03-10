<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CourseAdsTranslation extends Model
{
    protected $connection = 'main';
    public $timestamps = false;
    public $translatedAttributes = ['title', 'description', 'sub_title', 'outlines' ,];

}
