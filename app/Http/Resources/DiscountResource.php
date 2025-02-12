<?php

namespace App\Http\Resources;

use Hamcrest\Thingy;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'code'=>$this->code,
            'discount_percentage'=>$this->discount_percentage,
            'discount_fee'=>$this->discount_fee,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,

        ];
    }
}
