<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Client;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/clients",
     *     summary="Retrieve a list of clients",
     *     @OA\Response(
     *         response=200,
     *         description="List of clients retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Client")
     *             ),
     *             @OA\Property(property="message", type="string", example="Retrieved successfully")
     *         )
     *     )
     * )
     */

    public function index()
    {
        return ClientResource::collection(Client::get())
            ->additional(['message' => 'Retrieved successfully']);

    }


    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *     path="/clients/{id}",
     *     summary="Retrieve client information",
     *     description="Get details of a specific client by ID",
     *     operationId="getClientById",
     *     tags={"Clients"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the client to retrieve",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             example=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Client data retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 ref="#/components/schemas/Client"
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Retrieved successfully"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Client not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Client not found"
     *             )
     *         )
     *     )
     * )
     */

    public function show(Client $client)
    {
        return ClientResource::make($client)
            ->additional(['message' => 'Retrieved successfully']);

    }


}
