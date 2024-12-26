<?php

namespace App\Http\Controllers;

use App\Http\Clients\VenueClient;
use App\Http\Controllers\Controller;

class VenueController extends Controller
{

    private $venueClient;
    public function __construct()
    {
        $this->venueClient = new VenueClient();

    }


    /**
     * @OA\Get(
     *     path="/venue",
     *     summary="Get all venues",
     *     description="Retrieve a list of all venues",
     *     operationId="getAllVenues",
     *     tags={"Venues"},
     *     @OA\Response(
     *         response=200,
     *         description="List of venues retrieved successfully",
     *     )
     * )
     */
    public function getAllVenue()
    {
        return $this->venueClient->getAllVenue();
    }

    /**
     * @OA\Get(
     *     path="/venue/{id}",
     *     summary="Get a venue by ID",
     *     description="Retrieve details of a specific venue by its ID",
     *     operationId="getVenueById",
     *     tags={"Venues"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the venue",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Venue details retrieved successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Venue not found",
     *     )
     * )
     */
    public function getVenueById(string $id)
    {
        return $this->venueClient->getVenueById($id);
    }
}



