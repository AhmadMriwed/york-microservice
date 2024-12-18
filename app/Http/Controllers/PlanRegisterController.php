<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanRegisterResource;
use App\Models\planRegister;
use App\Http\Requests\StoreplanRegisterRequest;
use App\Http\Requests\UpdateplanRegisterRequest;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(planRegister $planRegister)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateplanRegisterRequest $request, planRegister $planRegister)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(planRegister $planRegister)
    {
        //
    }
}
