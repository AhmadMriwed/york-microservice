<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Http\Resources\ContactUsResource;
use App\Mail\ContactUsMail;
use App\Mail\ContactUsUserMail;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;

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



    /**
     * @OA\Post(
     *     path="/contact_us/send-message",
     *     summary="Send a contact message",
     *     description="Send a contact message to the admin and user.",
     *     operationId="sendMessage",
     *     tags={"Contact Us"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"name", "last_name", "phone", "Email", "Message"},
     *             @OA\Property(property="name", type="string", description="First name of the user", example="John"),
     *             @OA\Property(property="last_name", type="string", description="Last name of the user", example="Doe"),
     *             @OA\Property(property="phone", type="string", description="Phone number of the user", example="1234567890"),
     *             @OA\Property(property="Email", type="string", format="email", description="Email address of the user", example="john.doe@example.com"),
     *             @OA\Property(property="Message", type="string", description="Message content", example="Hello, I have a question about your services.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Message sent successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Your message has been sent successfully.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 additionalProperties=@OA\Property(
     *                     type="array",
     *                     @OA\Items(type="string")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="An error occurred while sending the message.")
     *         )
     *     )
     * )
     */


    public function sendMessage(ContactUsRequest $request)
    {
        $mailData = [
            "name" => $request->name,
            "last_name" => $request->last_name,
            "phone" => $request->phone,
            "Email" => $request->Email,
            "Message" => $request->Message,
        ];
        //return $mailData;
       // Mail::to("support@oxfordtraining.uk")->send(new sendMessage($mailData));

        Mail::to($mailData['Email'])->send(new ContactUsUserMail($mailData));
        Mail::to('099450735z@gmail.com')->send(new ContactUsMail($mailData));
      }


}
