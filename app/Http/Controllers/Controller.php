<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use OpenApi\Attributes as OA;

#[OA\Info(version: "1.0.0", description: "York Academy", title: "York Academy")]
#[OA\Server(url: "http://127.0.0.1:8000/api/")]
// #[OA\Server(url: "https://sleepy-tereshkova.212-227-199-24.plesk.page/api/")]

/**
 * @OA\Components(
 *     @OA\Parameter(
 *         parameter="Accept-Language",
 *         name="Accept-Language",
 *         in="header",
 *         required=false,
 *         description="اختر اللغة",
 *         @OA\Schema(
 *             type="string",
 *             enum={"en", "ar"},
 *             default="en"
 *         )
 *     )
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
