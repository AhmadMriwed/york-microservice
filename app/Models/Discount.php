<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'code',
        'discount_percentage',
        'discount_fee',
        'start_date',
        'end_date'
    ];
}
