<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactUsResource;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/contact_us",
     *     summary="Get all contact us",
     *     description="Retrieve a list of all contact us ",
     *     operationId="getContactUs",
     *     tags={"Contact Us"},
     *     @OA\Response(
     *         response=200,
     *         description="List of contact us ",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/ContactUs")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return ContactUsResource::collection(ContactUs::get())
            ->additional(['message' => 'Retrieved successfully']);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *     path="/contact_us/{id}",
     *     summary="Retrieve contact us entry by ID",
     *     description="Get details of a specific contact us entry by ID",
     *     operationId="getContactUsById",
     *     tags={"Contact Us"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the contact us entry to retrieve",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             example=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Contact Us entry retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 ref="#/components/schemas/ContactUs"
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
     *         description="Contact Us entry not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Contact Us entry not found"
     *             )
     *         )
     *     )
     * )
     */
    public function show(ContactUs $contactUs)
    {
        return ContactUsResource::make($contactUs)
            ->additional(['message' => 'Retrieved successfully']);
    }


}
