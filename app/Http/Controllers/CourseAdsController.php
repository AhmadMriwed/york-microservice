<?php

namespace App\Http\Controllers;

use App\Http\Clients\CourseAdsClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchAdvanceRequest;

class CourseAdsController extends Controller
{
    private $courseAdsClient;
    public function __construct()
    {
        $this->courseAdsClient = new CourseAdsClient();

    }

    /**
     * @OA\Get(
     *     path="/course_ads/search",
     *     summary="Search for advanced course ads",
     *     description="Search course ads with advanced filters",
     *     operationId="searchAdvanceCourseAds",
     *     tags={"Course Ads"},
     *     @OA\Parameter(
     *         name="languages[]",
     *         in="query",
     *         description="Filter by languages",
     *         required=false,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(type="string"),
     *             example={"English"}
     *         )
     *     ),
      *     @OA\Parameter(
     *         name="title",
     *         in="query",
     *         description="Filter by course title",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *             example=""
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="code",
     *         in="query",
     *         description="Filter by course code",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *             example="522828"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="venue_ids[]",
     *         in="query",
     *         description="Filter by venue IDs",
     *         required=false,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(type="integer"),
     *             example={29}
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="category_ids[]",
     *         in="query",
     *         description="Filter by category IDs",
     *         required=false,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(type="integer"),
     *             example={19}
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="months[]",
     *         in="query",
     *         description="Filter by months",
     *         required=false,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(type="string"),
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="years[]",
     *         in="query",
     *         description="Filter by years",
     *         required=false,
     *         @OA\Schema(
     *             type="array",
     *             @OA\Items(type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Search results retrieved successfully",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid request data",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Validation error")
     *         )
     *     )
     * )
     */


    public function searchAdvanceCourseAds(SearchAdvanceRequest $request)
    {
        return $this->courseAdsClient->SearchAdvanceCourseAds($request->validated());
    }


    /**
     * @OA\Get(
     *     path="/course_ads",
     *     summary="Get all course ads",
     *     description="Retrieve a list of all course ads",
     *     operationId="getAllCourseAds",
     *     tags={"Course Ads"},
     *     @OA\Response(
     *         response=200,
     *         description="List of course ads retrieved successfully",
     *     )
     * )
     */
    public function getAllCourseAds()
    {
        return $this->courseAdsClient->getAllCourseAds();
    }

    /**
     * @OA\Get(
     *     path="/course_ads/{id}",
     *     summary="Get course ad by ID",
     *     description="Retrieve details of a specific course ad by its ID",
     *     operationId="getCourseAdsById",
     *     tags={"Course Ads"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the course ad",
     *         required=true,
     *         @OA\Schema(type="string", example="1")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Course ad details retrieved successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Course ad not found",
     *     )
     * )
     */
    public function getCourseAdsById(string $id)
    {
        return $this->courseAdsClient->getCourseAdsById($id);
    }

     /**
     * @OA\Get(
     *     path="/course_ads/getMap/filterCourse",
     *     summary="Get map  filter course",
     *     description="Retrieve a map of filter course",
     *     operationId="getMapFilterCourse",
     *     tags={"Course Ads"},
     *     @OA\Response(
     *         response=200,
     *         description="Map of filter course retrieved successfully",
     *     )
     * )
     */
    public function getMapFilterCourse()
    {
        return $this->courseAdsClient->getMapFilterCourse();
    }
}


