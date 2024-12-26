<?php

namespace App\Http\Controllers;



use App\Http\Resources\ContactUsIconsResource;
use App\Models\ContactUsIcons;

class ContactUsIconsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *     path="/contact_us_icons",
     *     summary="Get all contact us icons",
     *     description="Retrieve a list of all contact us icons",
     *     operationId="getContactUsIcons",
     *     tags={"Contact Us"},
     *     @OA\Response(
     *         response=200,
     *         description="List of contact us icons",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/ContactUsIcons")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $icons = ContactUsIcons::with('type')->get();
        return ContactUsIconsResource::collection($icons)
            ->additional(['message' => 'Icons retrieved successfully.']);
    }

    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *     path="/contact_us_icons/{id}",
     *     summary="Retrieve contact us icon by ID",
     *     description="Get details of a specific contact us icon by ID",
     *     operationId="getContactUsIconById",
     *     tags={"Contact Us Icons"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the contact us icon to retrieve",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             example=1
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Contact Us Icon retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 ref="#/components/schemas/ContactUsIcons"
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Icon retrieved successfully."
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Contact Us Icon not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Icon not found"
     *             )
     *         )
     *     )
     * )
     */
    public function show(ContactUsIcons $contactUsIcons)
    {
        return ContactUsIconsResource::make($contactUsIcons->load('type'))
            ->additional(['message' => 'Icon retrieved successfully.']);
    }

}
