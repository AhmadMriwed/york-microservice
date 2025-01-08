<?php

namespace App\Http\Controllers;

use App\Http\Clients\TrainingPlanClient;
use App\Http\Resources\TrainingPlanResource;
use App\Models\TrainingPlan;

class TrainingPlanController extends Controller
{
    private $trainingPlanClient;

    public function __construct()
    {
        $this->trainingPlanClient=new TrainingPlanClient();
    }

    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/training_plan",
     *     summary="Get all training plans",
     *     description="Retrieve a list of all training plans",
     *     operationId="getAllTrainingPlans",
     *     tags={"Training Plans"},
     *     @OA\Response(
     *         response=200,
     *         description="List of training plans retrieved successfully",
     *     )
     * )
     */
    public function index()
    {
        return $this->trainingPlanClient->getAllTrainingPlans();
    }


    /**
     * @OA\Get(
     *     path="/training_plan/latestPlan",
     *     summary="Get the latest training plan for the current year",
     *     description="Retrieve the most recent training plan for the current year, if available",
     *     operationId="getLatestTrainingPlan",
     *     tags={"Training Plans"},
     *     @OA\Response(
     *         response=200,
     *         description="Latest training plan retrieved successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Training plan not found",
     *     )
     * )
     */
    public function getTrainingPlan()
    {
        
//        $latestTrainingPlan = TrainingPlan::where('year', date('Y'))->latest()->first();
//        if($latestTrainingPlan)
//            return TrainingPlanResource::make($latestTrainingPlan)->additional(['message' => 'Retrieved successfully']);
//        else
//            return response()->json(['message' => 'Not found']);

        return $this->trainingPlanClient->getLastTrainingPlan();
    }

    public function show(string $id){
        return $this->trainingPlanClient->getTrainingPlanById($id);
    }
}
