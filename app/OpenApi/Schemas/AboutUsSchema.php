<?php

namespace App\OpenApi\Schemas;
/**
 * @OA\Schema(
 *     schema="AboutUs",
 *     type="object",
 *     description="About Us model",
 *     @OA\Property(property="id", type="integer", description="ID of the about us record"),
 *     @OA\Property(property="title", type="string", description="Title of the about us section"),
 *     @OA\Property(property="description", type="string", description="Description of the about us section"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation timestamp"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp")
 * )
 */
class AboutUsSchema
{

}
