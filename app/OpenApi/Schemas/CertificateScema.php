<?php

namespace App\OpenApi\Schemas;
/**
* @OA\Schema(
 *     schema="Certificate",
 *     type="object",
 *     required={"certificate_id", "trainer_full_name", "valid_from", "valid_to"},
 *     @OA\Property(property="id", type="integer", example=1, description="Certificate ID"),
 *     @OA\Property(property="certificate_id", type="string", example="ABC123456", description="Unique certificate identifier"),
 *     @OA\Property(property="certificate_img", type="string", nullable=true, example="https://example.com/certificate.png", description="URL of the certificate image"),
 *     @OA\Property(property="trainer_full_name", type="string", example="John Doe", description="Full name of the trainer"),
 *     @OA\Property(property="trainer_img", type="string", nullable=true, example="https://example.com/trainer.png", description="URL of the trainer's image"),
 *     @OA\Property(property="valid_from", type="string", format="date", example="2024-01-01", description="Date when the certificate becomes valid"),
 *     @OA\Property(property="valid_to", type="string", format="date", example="2024-12-31", description="Date when the certificate expires"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-01-20T10:00:00Z", description="Timestamp when the certificate was created"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-01-20T12:00:00Z", description="Timestamp when the certificate was last updated")
* )
 */
class CertificateScema
{

}
