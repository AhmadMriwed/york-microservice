<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsIcons extends Model
{
    use HasFactory;
    public function type(){
        return $this->belongsTo(ContactUsIconsType::class,'contact_icons_type_id');

    }
}
