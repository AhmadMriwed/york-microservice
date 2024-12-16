<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'course_id',
        'full_name',
        'phone',
        'email',
        'gender',
        'address',
        'notes',
    ];
    use HasFactory;
}
