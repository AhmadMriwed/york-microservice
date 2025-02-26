<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsIcons extends Model
{
    use HasFactory;

    protected $fillable=[
      'type_id',
      'url'
    ];
    public function type(){
        return $this->belongsTo(ContactUsIconsType::class,'type_id');

    }
}
