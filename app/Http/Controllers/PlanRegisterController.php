<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanRegisterResource;
use App\Models\planRegister;
use App\Http\Requests\StoreplanRegisterRequest;
use App\Services\RegistrationPlanService;
use Illuminate\Support\Facades\Cookie;

class PlanRegisterController extends Controller
{
    protected $registrationService;

    public function __construct(RegistrationPlanService $registrationService)
    {
        $this->registrationService = $registrationService;
    }
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/plan_register",
     *     summary="Retrieve all plan registers",
     *     description="Get a list of all plan registers",
     *     operationId="getAllPlanRegisters",
     *     tags={"Plan Registers"},
     *     @OA\Response(
     *         response=200,
     *         description="List of plan registers retrieved successfully",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/PlanRegister")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid request data",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Validation error")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return PlanRegisterResource::collection(planRegister::get())
        ->additional(['message' => 'Retrieved successfully']);
    }



    /**
     * Store a newly created resource in storage.
     */

    /**
     * @OA\Post(
     *     path="/plan_register",
     *     summary="Store a new registration plan",
     *     description=" new registration plan with provided details",
     *     operationId="storePlanRegister",
     *     tags={"Plan Registers"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="training_plan_id",
     *                 type="integer",
     *                 description="ID of the training plan",
     *                 example=null
     *             ),
     *             @OA\Property(
     *                 property="full_name",
     *                 type="string",
     *                 description="Full name of the user",
     *                 example="John Doe"
     *             ),
     *             @OA\Property(
     *                 property="phone",
     *                 type="string",
     *                 description="Phone number of the user",
     *                 example="1234567890"
     *             ),
     *             @OA\Property(
     *                 property="email",
     *                 type="string",
     *                 description="Email address of the user",
     *                 example="omaralsayyad20032003@gmail.com"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Registration plan stored successfully",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Stored successfully"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid request data",
     *     )
     * )
     */
    public function store(StoreplanRegisterRequest $request)
    {
        $registrationDetails = $request->validated();

       $planRegister= $this->registrationService->registerOrUpdate($registrationDetails);

        Cookie::queue(Cookie::make('reg', 'yes', 3600));

      return  PlanRegisterResource::make($planRegister)->additional(['message' => 'stored successfully']);

    }

    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *     path="/plan_register/{id}",
     *     summary="Retrieve a specific plan register",
     *     description="Get details of a specific plan register by ID",
     *     operationId="getPlanRegisterById",
     *     tags={"Plan Registers"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the plan register to retrieve",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             example=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Plan register retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 ref="#/components/schemas/PlanRegister"
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Retrieved successfully"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Plan register not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Plan register not found"
     *             )
     *         )
     *     )
     * )
     */
    public function show(planRegister $planRegister)
    {
        return PlanRegisterResource::make($planRegister)
            ->additional(['message' => 'Retrieved successfully']);

    }

}
