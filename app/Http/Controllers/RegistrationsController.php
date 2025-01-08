<?php

namespace App\Http\Controllers;

use App\Http\Clients\CourseAdsClient;
use App\Http\Clients\RegistrationClient;
use App\Http\Resources\RegistrationResource;
use App\Models\Registration;
use App\Http\Requests\StoreRegistrationsRequest;
use App\Services\RegistrationService;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class RegistrationsController extends Controller
{
    private $registrationClient;

    public function __construct()
    {
        $this->registrationClient=new RegistrationClient();
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
     *             required={"title", "description", "fee", "start_date", "end_date", "hours", "language", "code", "category_id", "venue_id", "name", "email", "url", "job_title", "selection_training", "num_people", "entity_type", "course_ad_id"},
     *             @OA\Property(property="title", type="string", description="Title of the course"),
     *             @OA\Property(property="description", type="string", description="Description of the course"),
     *             @OA\Property(property="fee", type="string", description="Fee for the course"),
     *             @OA\Property(property="start_date", type="string", format="date", description="Start date of the course"),
     *             @OA\Property(property="end_date", type="string", format="date", description="End date of the course"),
     *             @OA\Property(property="hours", type="integer", description="Number of hours for the course"),
     *             @OA\Property(property="language", type="string", description="Language of the course"),
     *             @OA\Property(property="code", type="string", description="Unique code for the course"),
     *             @OA\Property(property="category_id", type="integer", description="ID of the course category"),
     *             @OA\Property(property="venue_id", type="integer", description="ID of the course venue"),
     *             @OA\Property(property="name", type="string", description="Name of the trainer"),
     *             @OA\Property(property="email", type="string", format="email", description="Email address of the trainer"),
     *             @OA\Property(property="url", type="string", format="url", description="URL for the course or related information"),
     *             @OA\Property(property="job_title", type="string", description="Job title of the trainer"),
     *             @OA\Property(property="cv_trainer", type="string", nullable=true, description="Trainer's CV"),
     *             @OA\Property(
     *                 property="selection_training",
     *                 type="object",
     *                 required={"name", "email", "functional_specialization", "phone_number", "trainer_id"},
     *                 @OA\Property(property="name", type="string", description="Name of the selection trainer"),
     *                 @OA\Property(property="email", type="string", format="email", description="Email of the selection trainer"),
     *                 @OA\Property(property="functional_specialization", type="string", description="Functional specialization of the selection trainer"),
     *                 @OA\Property(property="phone_number", type="string", description="Phone number of the selection trainer"),
     *                 @OA\Property(property="trainer_id", type="integer", description="ID of the trainer")
     *             ),
     *             @OA\Property(property="num_people", type="integer", description="Number of people registered"),
     *             @OA\Property(property="entity_type", type="string", description="Entity type (e.g., company, individual)"),
     *             @OA\Property(property="user_id", type="integer", nullable=true, description="ID of the user (nullable)"),
     *             @OA\Property(property="course_ad_id", type="integer", description="ID of the course advertisement")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Registration created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Created Successfully")
     *         )
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

        $response= $this->registrationClient->register(request()->all());
       RegistrationService::register($request->all(),$response);
        return $response;
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
