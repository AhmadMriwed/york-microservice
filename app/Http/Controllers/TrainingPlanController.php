<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainingPlanResource;
use App\Models\TrainingPlan;

class TrainingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TrainingPlanResource::collection( TrainingPlan::all())->additional(['message' => 'Retrieved successfully']);
    }

    public function getTrainingPlan()
    {
        $latestTrainingPlan = TrainingPlan::where('year', date('Y'))->latest()->first();
        if($latestTrainingPlan)
            return TrainingPlanResource::make($latestTrainingPlan)->additional(['message' => 'Retrieved successfully']);
        else
            return response()->json(['message' => 'Not found']);

    }

}
