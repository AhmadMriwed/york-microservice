<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsIcons extends Model
{
    use HasFactory;
    public function type(){
        return $this->belongsTo(ContactUsIconsType::class,'type_id');

    }
}
