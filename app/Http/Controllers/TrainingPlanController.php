<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainingPlanResource;
use App\Models\TrainingPlan;
use App\Http\Requests\StoreTrainingPlanRequest;
use App\Http\Requests\UpdateTrainingPlanRequest;

class TrainingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TrainingPlanResource::collection( TrainingPlan::all())->additional(['message' => 'retrieved successfully']);
    }

    public function getTrainingPlan()
    {
        $latestTrainingPlan = TrainingPlan::where('year', date('Y'))->latest()->first();
        if($latestTrainingPlan)
            return TrainingPlanResource::make($latestTrainingPlan)->additional(['message' => 'retrieved successfully']);
        else
            return response()->json(['message' => 'Not found']);

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
    public function store(StoreTrainingPlanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingPlan $trainingPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingPlan $trainingPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingPlanRequest $request, TrainingPlan $trainingPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingPlan $trainingPlan)
    {
        //
    }
}
