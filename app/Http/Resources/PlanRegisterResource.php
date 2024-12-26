<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class PlanRegisterResource extends JsonResource
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
            'training_plan_id'=>$this->training_plan_id,
            'full_name'=>$this->full_name,
            'phone'=>$this->phone,
            'email'=>$this->email,
        ];
    }
}
