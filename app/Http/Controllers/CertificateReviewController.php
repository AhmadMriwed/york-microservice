<?php

namespace App\Http\Controllers;

use App\Http\Resources\CertificateReviewResource;
use App\Models\CertificateReview;
use App\Http\Requests\StoreCertificateReviewRequest;
use App\Http\Requests\UpdateCertificateReviewRequest;
use App\Services\CertificateReviewService;

class CertificateReviewController extends Controller
{

    protected $certificateReviewService;

    public function __construct(CertificateReviewService $certificateReviewService)
    {
        $this->certificateReviewService = $certificateReviewService;
    }



    /**
     * @OA\Post(
     *     path="/certificates-review",
     *     summary="Send a request for certificate review",
     *     description="Send a request for certificate review to the admin.",
     *     operationId="store",
     *     tags={"Certificate Review"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"first_name", "last_name", "certificate_code", "email", "message"},
     *             @OA\Property(property="first_name", type="string", description="First name of the user", example="John"),
     *             @OA\Property(property="last_name", type="string", description="Last name of the user", example="Doe"),
     *             @OA\Property(property="certificate_code", type="string", description="certificate_coder", example="123456789"),
     *             @OA\Property(property="email", type="string", format="email", description="Email address of the user", example="omaralsayyad20032003@gmail.com"),
     *             @OA\Property(property="message", type="string", description="Message content", example="Hello, I have a question about your services.")
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
    public function store(StoreCertificateReviewRequest $request)
    {
        $reviewDetail=$request->validated();

       $certificateReview=$this->certificateReviewService->sendMessage($reviewDetail);
        return  CertificateReviewResource::make($certificateReview)->additional(['message' => 'stored successfully']);


    }

}
