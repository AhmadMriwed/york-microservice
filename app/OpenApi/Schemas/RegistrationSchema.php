<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="Registration",
 *     description="Registration model",
 *     type="object",
 *     @OA\Property(property="id", type="integer", description="ID of the registration"),
 *     @OA\Property(property="course_id", type="integer", description="ID of the course"),
 *     @OA\Property(property="full_name", type="string", description="Full name of the registrant"),
 *     @OA\Property(property="phone", type="string", description="Phone number of the registrant"),
 *     @OA\Property(property="email", type="string", format="email", description="Email address of the registrant"),
 *     @OA\Property(property="gender", type="string", description="Gender of the registrant"),
 *     @OA\Property(property="address", type="string", description="Address of the registrant"),
 *     @OA\Property(property="notes", type="string", description="Additional notes for the registration"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation timestamp"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp")
 * )
 */

class RegistrationSchema
{

}
