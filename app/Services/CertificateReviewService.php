<?php

namespace App\Services;

use App\Mail\CertificateReviewMail;
use App\Mail\CertificateReviewUserMail;
use App\Models\CertificateReview;
use Illuminate\Support\Facades\Mail;

class CertificateReviewService
{

    public static function sendMessage(array $attributes)
    {
        $certificateReview=CertificateReview::query()->create($attributes);

        $mailData = [
            "first_name" => $attributes['first_name'],
            "last_name" => $attributes['last_name'],
            "certificate_code" => $attributes['certificate_code'],
            "email" => $attributes['email'],
            "message" => $attributes['message'],
        ];


        Mail::to($mailData['email'])->send(new CertificateReviewUserMail($mailData));
        Mail::to('099450735z@gmail.com')->send(new CertificateReviewMail($mailData));

        return $certificateReview;

    }
}
