<?php

namespace App\Http\Controllers;

use App\Http\Clients\CourseAdsClient;
use App\Http\Resources\RegistrationResource;
use App\Models\Registration;
use App\Http\Requests\StoreRegistrationsRequest;
use App\Http\Requests\UpdateRegistrationsRequest;
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
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registrations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistrationsRequest $request, Registration $registrations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registrations)
    {
        //
    }
}
