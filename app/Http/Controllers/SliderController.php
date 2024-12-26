<?php

namespace App\Http\Controllers;

use App\Http\Resources\SliderResource;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/sliders",
     *     summary="Get all sliders",
     *     description="Retrieve a list of all sliders",
     *     operationId="getAllSliders",
     *     tags={"Sliders"},
     *     @OA\Response(
     *         response=200,
     *         description="List of sliders retrieved successfully",
     *     )
     * )
     */
    public function index()
    {
        return SliderResource::collection(Slider::get())
            ->additional(['message' => 'Retrieved successfully']);

    }

    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *     path="/sliders/{id}",
     *     summary="Get details of a specific slider",
     *     description="Retrieve the slider details by ID",
     *     operationId="getSliderById",
     *     tags={"Sliders"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the slider to retrieve",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             example=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="slider data retrieved successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="slider not found",
     *     )
     * )
     */
    public function show(Slider $slider)
    {
        return SliderResource::make($slider)
            ->additional(['message' => 'Retrieved successfully']);
    }

}
