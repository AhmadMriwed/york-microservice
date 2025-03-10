<?php

namespace App\Http\Controllers;

use App\Http\Resources\SectionResource;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/sections",
     *     summary="Get all sections",
     *     description="Retrieve a list of all sections",
     *     operationId="getAllSections",
     *     tags={"Sections"},
     *       @OA\Parameter(
     *         ref="#/components/parameters/Accept-Language"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of sections retrieved successfully",
     *     )
     * )
     */
    public function index()
    {
        return SectionResource::collection(Section::get())
            ->additional(['message' => __('messages.retrievedSuccess')]);

    }

    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *     path="/sections/{id}",
     *     summary="Get details of a specific section",
     *     description="Retrieve the section details by ID",
     *     operationId="getSectionById",
     *     tags={"Sections"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the section to retrieve",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             example=1
     *         )
     *     ),
     *       @OA\Parameter(
     *         ref="#/components/parameters/Accept-Language"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Section data retrieved successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Section not found",
     *     )
     * )
     */
    public function show(Section $section)
    {
        return SectionResource::make($section)
            ->additional(['message' => __('messages.retrievedSuccess')]);

    }

}
