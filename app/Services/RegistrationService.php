<?php

namespace App\Services;

use App\Models\Registration;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class RegistrationService
{
    public static function register($attributes, $courseData): Model|Builder
    {
        $attributes = array_merge($attributes,[
            'course_code' => $courseData['data']['code'] ?? null,
            'course_title' => $courseData['data']['title'] ?? null,
            'course_venue' => $courseData['data']['venue']['title'] ?? null,
            'course_category' => $courseData['data']['category']['title'] ?? null,
            'course_start_date' => $courseData['data']['start_date'] ?? null,
            'course_end_date' => $courseData['data']['end_date'] ?? null,
        ]);

        unset($attributes['course_id']);

        return Registration::query()->create($attributes);
    }
}
