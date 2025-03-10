<?php

namespace App\Http\Controllers;

use App\Http\Resources\AboutUsResource;
use App\Models\aboutUs;




class AboutUsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/aboutUs",
     *     summary="Get About Us information",
     *       @OA\Parameter(
     *         ref="#/components/parameters/Accept-Language"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="About Us data retrieved successfully",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/AboutUs")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return AboutUsResource::collection(AboutUs::get())
            ->additional(['message' =>__('messages.retrievedSuccess') ]);
    }
}
