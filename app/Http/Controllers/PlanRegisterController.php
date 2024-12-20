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
    public function index()
    {
        return PlanRegisterResource::collection(planRegister::get())
        ->additional(['message' => 'Retrieved successfully']);
    }



    /**
     * Store a newly created resource in storage.
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
    public function show(planRegister $planRegister)
    {
        return PlanRegisterResource::make($planRegister)
            ->additional(['message' => 'Retrieved successfully']);

    }

}
