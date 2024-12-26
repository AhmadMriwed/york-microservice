<?php

namespace App\OpenApi\Schemas;
/**
 * @OA\Schema(
 *     schema="ContactUs",
 *     type="object",
 *     description="Contact Us model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example=1,
 *         description="Unique identifier for the contact us record"
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="General Inquiry",
 *         description="Type of contact request"
 *     ),
 *     @OA\Property(
 *         property="content",
 *         type="string",
 *         example="This is the content of the contact request.",
 *         description="Content of the contact us "
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Timestamp when the record was created"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Timestamp when the record was last updated"
 *     )
 * )
 */
class ContactUsSchema
{

}
