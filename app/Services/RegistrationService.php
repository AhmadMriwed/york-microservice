<?php

namespace App\Services;

use App\Mail\RegistrationMail;
use App\Models\Registration;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class RegistrationService
{
    public static function register(array $attributes,$courseData): Model|Builder
{
    $registration = Registration::query()->create($attributes);

    $registrationDetails = [
        'full_name' => $attributes['full_name'],
        'email' => $attributes['email'],
        'gender'=>$attributes['gender'],
        'phone'=>$attributes['phone'],
        'address'=>$attributes['address'],
        'notes'=>$attributes['notes'],
        'course_id'=>$attributes['course_id'],
        'course_code' => $courseData['data']['code'],
        'course_title' => $courseData['data']['title'] ,
        'course_venue' => $courseData['data']['venue']['title'],
        'course_category' => $courseData['data']['category']['title'],
        'course_start_date' => $courseData['data']['start_date'],
        'course_end_date' => $courseData['data']['end_date'],

    ];
    $messageToSend= $registrationDetails['full_name'] . ", You are successfully registered for the course \"" .$registrationDetails['course_title'] . "." . "\"\r\nCourse code: " .$registrationDetails['course_code'] . "\r\nWe will contact you asap.";
    Mail::raw($messageToSend, function($message) use ($registrationDetails)
    {
        $message->subject('Register For a Course');
        $message->from('099450735z@gmail.com', 'York British Academy');
        $message->to($registrationDetails['email']);
    });


    Mail::to('099450735z@gmail.com')->send(new RegistrationMail($registrationDetails));

    return $registration;
}
}
