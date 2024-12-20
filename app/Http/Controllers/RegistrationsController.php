<?php

namespace App\Http\Controllers;

use App\Http\Clients\CourseAdsClient;
use App\Http\Resources\RegistrationResource;
use App\Models\Registration;
use App\Http\Requests\StoreRegistrationsRequest;
use App\Services\RegistrationService;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class RegistrationsController extends Controller
{
    private $courseAdsClient;

    public function __construct()
    {
        $this->courseAdsClient = new CourseAdsClient(); // Initialize the client
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistrationsRequest $request)
    {
        $courseData = $this->courseAdsClient->getCourseAdsById($request->course_id);

        if (!$courseData) {
            return response()->json([
                'message' => 'Course data not found.',
            ], 404);
        }

        return RegistrationResource::make(RegistrationService::register($request->validated(),$courseData))
            ->additional(['message'=>'Created Successfully']);
    }



    /**
     * Display the specified resource.
     */
    public function show(Registration $registrations)
    {
        return RegistrationResource::make($registrations)
            ->additional(['message' => 'Retrieved successfully']);
    }


}
