<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_code',
        'first_name',
        'last_name',
        'email',
        'message',
    ];
}
