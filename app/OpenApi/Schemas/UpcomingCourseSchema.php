<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="UpcomingCourse",
 *     type="object",
 *     title="UpcomingCourse",
 *     description="Schema for an upcoming course",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="Unique identifier for the course",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="course_date",
 *         type="string",
 *         format="date",
 *         description="The date of the course",
 *         example="2024-01-01"
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         description="Title of the course",
 *         example="Introduction to Programming"
 *     ),
 *     @OA\Property(
 *         property="img",
 *         type="string",
 *         format="url",
 *         nullable=true,
 *         description="URL of the course image (optional)",
 *         example="https://example.com/images/course.jpg"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Detailed description of the course",
 *         example="This course provides an introduction to programming concepts using Python."
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Timestamp when the course was created",
 *         example="2024-01-01T12:34:56Z"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Timestamp when the course was last updated",
 *         example="2024-01-02T15:45:30Z"
 *     )
 * )
 */

class UpcomingCourseSchema
{

}
