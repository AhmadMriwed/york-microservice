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
        'full_name' => $attributes['name'],
        'email' => $attributes['email'],
        // 'gender'=>$attributes['gender'],
        // 'phone'=>$attributes['phone'],
        //  'address'=>$attributes['address'],
        // 'notes'=>$attributes['notes'],
        'course_id'=>$attributes['course_ad_id'],
        'course_code' => $attributes['code'],
        'course_title' => $attributes['title'] ,
        'course_venue' => $response['data']['venue']['title'],
        'course_category' => $response['data']['category']['title'],
        'course_start_date' => $attributes['start_date'],
        'course_end_date' => $attributes['end_date'],

    ];

   Mail::to($registrationDetails['email'])->send(new RegistrationUserMail($registrationDetails));
   Mail::to('099450735z@gmail.com')->send(new RegistrationMail($registrationDetails));
}
}
