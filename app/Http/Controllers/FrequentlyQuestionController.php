<?php

namespace App\Http\Controllers;

use App\Http\Resources\FrequentlyQuestionResource;
use App\Models\FrequentlyQuestion;

class FrequentlyQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Display a list of frequently asked questions.
     *
     * @OA\Get(
     *     path="/frequently_questions",
     *     summary="Get all FAQs",
     *     description="Retrieve a list of frequently asked questions",
     *     tags={"Frequently Questions"},
     *     @OA\Response(
     *         response=200,
     *         description="List of FAQs retrieved successfully",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/FrequentlyQuestion")
     *         )
     *     )
     * )
     */
    public function index()
    {
      return FrequentlyQuestionResource::collection(FrequentlyQuestion::get())
          ->additional(['message' => 'Retrieved successfully']);
    }



    /**
     * Display the specified resource.
     */

    /**
     * Retrieve a specific FAQ by ID.
     *
     * @OA\Get(
     *     path="/frequently_questions/{id}",
     *     summary="Retrieve an FAQ",
     *     description="Get details of a specific FAQ by ID",
     *     tags={"Frequently Questions"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the FAQ to retrieve",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="FAQ retrieved successfully",
     *         @OA\JsonContent(ref="#/components/schemas/FrequentlyQuestion")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="FAQ not found"
     *     )
     * )
     */
    public function show(FrequentlyQuestion $frequentlyQuestion)
    {
        return FrequentlyQuestionResource::make($frequentlyQuestion)
            ->additional(['message' => 'Retrieved successfully']);
    }

}
