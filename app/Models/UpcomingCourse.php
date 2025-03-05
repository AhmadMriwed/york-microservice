<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class UpcomingCourse extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable=[
        'title',
        'description',
        'img',
        'course_date',
    ];

    public $translatable = ['title','description'];
}
