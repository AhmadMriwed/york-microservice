<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="PlanRegister",
 *     description="Plan register model",
 *     type="object",
 *     @OA\Property(property="id", type="integer", description="ID of the registration"),
 *     @OA\Property(property="training_plan_id", type="integer", description="ID of the training plan"),
 *     @OA\Property(property="full_name", type="string", description="Full name of the user"),
 *     @OA\Property(property="phone", type="string", description="Phone number of the user"),
 *     @OA\Property(property="email", type="string", description="Email address of the user"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation timestamp"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp")
 * )
 */

class planRegisterSchema
{

}
