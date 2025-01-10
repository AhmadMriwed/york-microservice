<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsType extends Model
{
    use HasFactory;

    public function contact(){
        return $this->hasMany(ContactUs::class,'type_id');
    }
}
