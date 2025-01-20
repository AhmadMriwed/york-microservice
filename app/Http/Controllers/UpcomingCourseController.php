<?php

namespace App\Http\Controllers;

use App\Http\Resources\UpcomingCourseResource;
use App\Models\UpcomingCourse;

class UpcomingCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/upcoming-courses",
     *     summary="Get all upcoming courses",
     *     description="Retrieve a list of all upcoming courses",
     *     operationId="getUpcomingCourses",
     *     tags={"Upcoming Courses"},
     *     @OA\Response(
     *         response=200,
     *         description="List of upcoming courses retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="array",
     *                 @OA\Items(ref="#/components/schemas/UpcomingCourse")
     *             ),
     *             @OA\Property(property="message", type="string", example="Retrieved successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="An error occurred")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return UpcomingCourseResource::collection(UpcomingCourse::get())
            ->additional(['message' => 'Retrieved successfully']);

    }



    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *     path="/upcoming-courses/{id}",
     *     summary="Get details of a specific upcoming course",
     *     description="Retrieve details of an upcoming course by its ID",
     *     operationId="getUpcomingCourse",
     *     tags={"Upcoming Courses"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the upcoming course",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Upcoming course details retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", ref="#/components/schemas/UpcomingCourse"),
     *             @OA\Property(property="message", type="string", example="Retrieved successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Upcoming course not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Course not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="An error occurred")
     *         )
     *     )
     * )
     */

    public function show(UpcomingCourse $upcomingCourse)
    {
        return UpcomingCourseResource::make($upcomingCourse)
            ->additional(['message' => 'Retrieved successfully']);

    }


}
