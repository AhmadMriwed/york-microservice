<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
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
            'certificate_id'=>$this->certificate_id,
            'certificate_img'=>$this->certificate_img,
            'trainer_full_name' =>$this->trainer_full_name,
            'trainer_img'=>$this->trainer_img,
            'valid_from'=>$this->valid_from,
            'valid_to'=>$this->valid_to,

            ];
    }
}
