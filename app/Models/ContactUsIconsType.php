<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsIconsType extends Model
{
    use HasFactory;

    public function icons(){
        return $this->hasMany(ContactUsIcons::class,'type_id');

    }
}
