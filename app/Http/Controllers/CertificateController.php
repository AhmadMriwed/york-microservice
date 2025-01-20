<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchCertificateRequest;
use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * @OA\Get(
     *     path="/certificates",
     *     summary="Get all certificates",
     *     description="Retrieve a list of all certificates",
     *     operationId="getCertificates",
     *     tags={"Certificates"},
     *     @OA\Response(
     *         response=200,
     *         description="List of certificates retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Retrieved successfully"),
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Certificate"))
     *         )
     *     )
     * )
     *
*/
    public function index()
    {
        return CertificateResource::collection(Certificate::get())
            ->additional(['message' => 'Retrieved successfully']);

    }




    /**
     * Display the specified resource.
     */

/**
* @OA\Get(
*     path="/certificates/{certificate_id}",
*     summary="Get a specific certificate",
*     description="Retrieve details of a specific certificate by its ID",
*     operationId="getCertificate",
*     tags={"Certificates"},
*     @OA\Parameter(
 *         name="certificate_id",
 *         in="path",
 *         description="The ID of the certificate to retrieve",
 *         required=true,
 *         @OA\Schema(type="integer", example=1)
*     ),
 *     @OA\Response(
 *         response=200,
 *         description="Certificate retrieved successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Retrieved successfully"),
 *             @OA\Property(property="data", ref="#/components/schemas/Certificate")
*         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Certificate not found",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Certificate not found")
*         )
 *     )
 * )
 */
    public function show(Certificate $certificate)
    {
        return CertificateResource::make($certificate)
            ->additional(['message' => 'Retrieved successfully']);

    }


    /**
     * @OA\Get(
     *     path="/certificates/search",
     *     summary="Search for a certificate",
     *     description="Search for a certificate by its unique code and return the details if found.",
     *     operationId="certificatesSearch",
     *     tags={"Certificates"},
     *     @OA\Parameter(
     *         name="code",
     *         in="query",
     *         required=true,
     *         description="The unique code of the certificate to search for",
     *         @OA\Schema(type="string", example="ABC123456")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Certificate retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Retrieved successfully"),
     *             @OA\Property(property="data", ref="#/components/schemas/Certificate")
     *       )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Certificate not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="No Results Found")
     *         )
     *     ),
     *
     * )
     */

    public function certificates_search(SearchCertificateRequest $request)
    {
        $certificateIdTerm = $request->input('code');

        $result = Certificate::where('certificate_id', $certificateIdTerm)->first();

        if (is_null($result) || empty($result)) {
            return response()->json([
                'message' => 'No Results Found',
            ], 404);
        }

        return CertificateResource::make($result)
            ->additional(['message' => 'Retrieved successfully']);

    }

}
