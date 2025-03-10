<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ContactUs extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable=[
      'type_id',
      'content'
    ];

    public $translatable = ['content'];

    public function type(){
        return $this->belongsTo(ContactUsType::class,'type_id');
    }

}
