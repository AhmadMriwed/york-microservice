<?php

namespace App\Http\Controllers;

use App\Http\Resources\CounterResource;
use App\Models\Counter;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/counters",
     *     summary="Get all counters",
     *     description="Retrieve a list of all counters",
     *     operationId="getCounters",
     *     tags={"Counters"},
     *     @OA\Response(
     *         response=200,
     *         description="List of counters retrieved successfully",
     *     )
     * )
     */
    public function index()
    {
        return CounterResource::collection(Counter::get())
            ->additional(['message' => 'Retrieved successfully']);

    }


    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *     path="/counters/{id}",
     *     summary="Get counter by ID",
     *     description="Retrieve a specific counter by its ID",
     *     operationId="getCounterById",
     *     tags={"Counters"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the counter to retrieve",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Counter retrieved successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Counter not found",
     *     )
     * )
     */
    public function show(Counter $counter)
    {
        return CounterResource::make($counter)
            ->additional(['message' => 'Retrieved successfully']);

    }

}
