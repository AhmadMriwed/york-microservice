<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;


    protected $fillable = [
        'course_id',
        'full_name',
        'phone',
        'email',
        'gender',
        'address',
        'notes',
    ];

}
