<?php

namespace App\Services;

use App\Http\Clients\RegistrationClient;
use App\Mail\RegistrationMail;
use App\Mail\RegistrationUserMail;
use App\Models\Registration;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class RegistrationService
{
    public static function register(array $attributes,$response)
{

   // $registration = Registration::query()->create($attributes);




    $registrationDetails = [
        'full_name' => $attributes['name']??null,
        'email' => $attributes['email']?? null,
        // 'gender'=>$attributes['gender'],
        // 'phone'=>$attributes['phone'],
        //  'address'=>$attributes['address'],
        // 'notes'=>$attributes['notes'],
        'course_id'=>$attributes['course_ad_id']?? null,
        'course_code' => $attributes['code']?? null,
        'course_title' => $attributes['title'] ?? null,
        'course_venue' => $response['data']['venue']['title']?? null,
        'course_category' => $response['data']['category']['title']?? null,
        'course_start_date' => $attributes['start_date']?? null,
        'course_end_date' => $attributes['end_date']?? null,

    ];

   Mail::to($registrationDetails['email'])->send(new RegistrationUserMail($registrationDetails));
   Mail::to('099450735z@gmail.com')->send(new RegistrationMail($registrationDetails));
}
}
