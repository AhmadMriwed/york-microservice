<?php

namespace App\Services;

use App\Models\Discount;
use Illuminate\Http\Exceptions\HttpResponseException;

class DiscountService
{
   

    public static function applyDiscount( $discountCode = null, int $fee)
    {
        $discountPercentage = 0;
        $discountFee = 0;
       
        // check
        if ($discountCode) {
            $discount = self::validateDiscount($discountCode);
           
            $discountPercentage = $discount->discount_percentage ?? 0;
            $discountFee = $discount->discount_fee ?? 0;
        }

        $totalFee = $fee;
        $appliedDiscountFee = 0;

        //  apply
        if ($discountPercentage > 0) {
            $appliedDiscountFee = ($fee * $discountPercentage) / 100;
            $totalFee = $fee - $appliedDiscountFee;
        } elseif ($discountFee > 0) {
            $appliedDiscountFee = min($discountFee, $fee);
            $totalFee = $fee - $appliedDiscountFee;
        }

        return [
            'discount_code' => $discountCode,
            'original_fee' => $fee,
            'discount_fee' => $appliedDiscountFee,
            'total_fee' => max(0, $totalFee),
        ];
    }

    public static function validateDiscount(string $discountCode)
    {
        $discount = Discount::where('code', $discountCode)->first();
        $currentDate = date('Y-m-d');


        if (!$discount) {
            throw new HttpResponseException(response()->json([
                'message' => __('messages.notFound')
            ], 404));
        }

        if ($discount->start_date > now()) {
            throw new HttpResponseException(response()->json([
                'message' => __('messages.notStartedDiscount')
            ], 422));
        }

        if ($discount->end_date < now()) {
            throw new HttpResponseException(response()->json([
                'message' => __('messages.expiredDiscount')
            ], 422));
        }

        /// old code

        // if (is_null($discount) || empty($discount)) {
        //     return response()->json([
        //         'message' => __('messages.notFound'),
        //     ], 404);
        // }
        // if ($discount->start_date > $currentDate) {
        //     return response()->json([
        //         'message' => __('messages.notStartedDiscount'),
        //     ], 422);
        // }
        // if ($discount->end_date < $currentDate) {
        //     return response()->json([
        //         'message' => __('messages.expiredDiscount'),
        //     ], 422);
        // }

        return $discount;
    }
}
