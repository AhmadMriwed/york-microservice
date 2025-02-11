<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateReviewResource extends JsonResource
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
            'certificate_code'=>$this->certificate_code,
            'first_name'=>$this->first_name,
            'last_name' =>$this->last_name,
            'email'=>$this->email,
            'message'=>$this->message,
        ];
    }
}
