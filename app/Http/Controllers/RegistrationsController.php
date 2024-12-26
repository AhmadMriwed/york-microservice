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

    /**
     * @OA\Post(
     *     path="/registration",
     *     summary="Create a new registration",
     *     description="Store a new registration for a course",
     *     operationId="createRegistration",
     *     tags={"Registrations"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"course_id", "full_name", "phone", "email", "gender", "address", "notes"},
     *             @OA\Property(property="course_id", type="integer", description="ID of the course"),
     *             @OA\Property(property="full_name", type="string", description="Full name of the registrant"),
     *             @OA\Property(property="phone", type="string", description="Phone number of the registrant"),
     *             @OA\Property(property="email", type="string", format="email", description="Email address of the registrant"),
     *             @OA\Property(property="gender", type="string", description="Gender of the registrant"),
     *             @OA\Property(property="address", type="string", description="Address of the registrant"),
     *             @OA\Property(property="notes", type="string", description="Additional notes for the registration")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Registration created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Created Successfully"),
     *
     *          )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Course not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Course data not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input data",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Validation error")
     *         )
     *     )
     * )
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

    /**
     * @OA\Get(
     *     path="/registration/{id}",
     *     summary="Get details of a specific registration",
     *     description="Retrieve the registration details by ID",
     *     operationId="getRegistrationById",
     *     tags={"Registrations"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the registration to retrieve",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             example=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Registration data retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Retrieved successfully"),
     *             @OA\Property(property="data", ref="#/components/schemas/Registration")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Registration not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Registration not found")
     *         )
     *     )
     * )
     */
    public function show(Registration $registrations)
    {
        return RegistrationResource::make($registrations)
            ->additional(['message' => 'Retrieved successfully']);
    }


}
