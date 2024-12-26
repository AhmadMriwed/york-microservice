<?php

namespace App\OpenApi\Schemas;
/**
 * @OA\Schema(
 *     schema="Client",
 *     type="object",
 *     description="Client model",
 *     @OA\Property(property="id", type="integer", example=1, description="Client ID"),
 *     @OA\Property(property="img", type="string", nullable=true, description="Image URL or binary data"),
 *     @OA\Property(property="url", type="string", example="https://example.com", description="Client's URL"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation timestamp"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp")
 * )
 */
class ClientSchema
{

}
