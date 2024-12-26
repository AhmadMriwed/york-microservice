<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="ContactUsIcons",
 *     type="object",
 *     description="Contact Us Icon model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example=1,
 *         description="Unique identifier for the contact us icon"
 *     ),
 *     @OA\Property(
 *         property="contact_icons_type_id",
 *         type="integer",
 *         example=1,
 *         description="ID of the related icon type"
 *     ),
 *     @OA\Property(
 *         property="url",
 *         type="string",
 *         format="url",
 *         example="https://example.com/icon.png",
 *         description="URL of the icon"
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

class ContactUsIconsSchema
{

}
