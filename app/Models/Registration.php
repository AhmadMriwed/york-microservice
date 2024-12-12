<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'gender',
        'address',
        'notes',
        'course_code',
        'course_title',
        'course_venue',
        'course_category',
        'course_start_date',
        'course_end_date',
    ];
    use HasFactory;
}
