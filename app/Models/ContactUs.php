<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable=[
      'type_id',
      'content'
    ];

    public function type(){
        return $this->belongsTo(ContactUsType::class,'type_id');
    }

}
