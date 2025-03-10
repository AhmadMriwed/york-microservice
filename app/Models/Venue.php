<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends BaseModel
{
    
    use HasFactory;
    protected $connection = 'main';
    const VENUE='Media/Venue';

    protected $fillable = [
        'img',

    ];
    public $translatedAttributes = ['title', 'description'];
}
