<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutUs extends Model
{

    use HasFactory,HasTranslations;
    protected $table="about_us";
    protected $fillable=[
        'title',
        'description',
        'url'
        ];

    public $translatable = ['title','description'];
}
