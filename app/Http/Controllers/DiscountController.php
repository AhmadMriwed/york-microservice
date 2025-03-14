<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiscountResource;
use App\Models\Discount;
use App\Http\Requests\DiscountSearchRequest;
use App\Services\DiscountService;
use Filament\Resources\Resource;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountController extends Controller
{


    protected $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    /**
     * @OA\Get(
     *     path="/discounts",
     *     summary="Get all discounts",
     *     description="Retrieve a list of all discounts",
     *     operationId="getDiscounts",
     *     tags={"Discounts"},
     *       @OA\Parameter(
     *         ref="#/components/parameters/Accept-Language"
     *     ),
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
            ->additional(['message' => __('messages.retrievedSuccess')]);
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
     *       @OA\Parameter(
     *         ref="#/components/parameters/Accept-Language"
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
        $discount = $this->discountService ->validateDiscount($discountCode);
        if (!$discount instanceof Discount) {
            return $discount; 
        }

        /// old code
        // $result = Discount::where('code',$discountCode)->first();
        // $currentDate = date('Y-m-d');

        // if (is_null($result) || empty($result)) {
        //     return response()->json([
        //         'message' =>  __('messages.notFound'),
        //     ], 404);
        // }
        // if($result->start_date > $currentDate)
        // {
        //     return response()->json([
        //         'message' => __('messages.notStartedDiscount'),
        //     ], 422);
        // }
        // if($result->end_date < $currentDate)
        // {
        //     return response()->json([
        //         'message' => __('messages.expiredDiscount'),
        //     ], 422);
        // }


        return DiscountResource::make($discount)
            ->additional(['message' => __('messages.retrievedSuccess')]);

    }


 /**
 * @OA\Get(
 *     path="/discounts/apply",
 *     summary="Apply a discount",
 *     description="Apply a discount to a given fee using a discount code and return the calculated total fee, discount fee, and original fee.",
 *     operationId="applyDiscount",
 *     tags={"Discounts"},
 *     @OA\Parameter(
 *         name="code",
 *         in="query",
 *         required=true,
 *         description="The unique discount code to be applied",
 *         @OA\Schema(type="string", example="ABC123456")
 *     ),
 *     @OA\Parameter(
 *         name="fee",
 *         in="query",
 *         required=true,
 *         description="The original fee before applying the discount",
 *         @OA\Schema(type="number", format="float", example=100.00)
 *     ),
 *     @OA\Parameter(
 *         ref="#/components/parameters/Accept-Language"
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Discount applied successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Retrieved successfully"),
 *             @OA\Property(property="fee", type="number", format="float", example=100.00),
 *             @OA\Property(property="discount_fee", type="number", format="float", example=10.00),
 *             @OA\Property(property="total_fee", type="number", format="float", example=90.00)
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Discount code not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Discount code not found")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Invalid or expired discount",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="This discount has expired or is not valid yet")
 *         )
 *     )
 * )
 */
public function applyDiscount(DiscountSearchRequest $request)
{
    $discountCode = $request->input('code');
    $fee = $request->input('fee');
  
    $result = $this->discountService->applyDiscount($discountCode, $fee);
    

    return JsonResource::make($result)
        ->additional(['message' => __('messages.retrievedSuccess')]);
}




}
