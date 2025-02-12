<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiscountResource;
use App\Models\Discount;
use App\Http\Requests\DiscountSearchRequest;

class DiscountController extends Controller
{


    /**
     * @OA\Get(
     *     path="/discounts",
     *     summary="Get all discounts",
     *     description="Retrieve a list of all discounts",
     *     operationId="getDiscounts",
     *     tags={"Discounts"},
     *     @OA\Response(
     *         response=200,
     *         description="List of discounts retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Retrieved successfully"),
     *         )
     *     )
     * )
     *
     */
    public function index()
    {
        return DiscountResource::collection(Discount::get())
            ->additional(['message' => 'Retrieved successfully']);
    }


    /**
     * @OA\Get(
     *     path="/discounts/search",
     *     summary="Search for a discount",
     *     description="Search for a discount by its unique code and return the details if found.",
     *     operationId="discountsSearch",
     *     tags={"Discounts"},
     *     @OA\Parameter(
     *         name="code",
     *         in="query",
     *         required=true,
     *         description="The unique code of the discount to search for",
     *         @OA\Schema(type="string", example="ABC123456")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="discount retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Retrieved successfully"),
     *       )
     *         )
     *     ),
     *
     * )
     */

    public function discount_search(DiscountSearchRequest $request)
    {
        $discountCode = $request->input('code');

        $result = Discount::where('code',$discountCode)->first();
        $currentDate = date('Y-m-d');

        if (is_null($result) || empty($result)) {
            return response()->json([
                'message' => 'No Results Found',
            ], 404);
        }
        if($result->start_date > $currentDate)
        {
            return response()->json([
                'message' => 'discount has not started yet',
            ], 422);
        }
        if($result->end_date < $currentDate)
        {
            return response()->json([
                'message' => 'discount has expired',
            ], 422);
        }


        return DiscountResource::make($result)
            ->additional(['message' => 'Retrieved successfully']);

    }


}
