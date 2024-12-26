<?php

namespace App\OpenApi\Schemas;
/**
 * @OA\Schema(
 *     schema="FrequentlyQuestion",
 *     type="object",
 *     title="Frequently Asked Question",
 *     description="A model representing a frequently asked question and its answer",
 *     @OA\Property(property="id", type="integer", description="ID of the FAQ"),
 *     @OA\Property(property="question", type="string", description="The question text"),
 *     @OA\Property(property="answer", type="string", description="The answer text"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Timestamp when the FAQ was created"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Timestamp when the FAQ was last updated")
 * )
 */

class FrequentlyQuestionSchema
{

}
