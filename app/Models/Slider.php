<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = [
        'img', 'title', 'description', 'first_btn_text', 'first_btn_url', 'second_btn_text', 'second_btn_url'
    ];

    public $translatable = ['title','description','first_btn_text','second_btn_text'];

}
