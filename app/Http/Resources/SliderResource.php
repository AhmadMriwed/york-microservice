<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'img'=>$this->img,
            'title'=>$this->title,
            'description'=>$this->description,
            'first_btn_text'=>$this->first_btn_text,
            'first_btn_url'=>$this->first_btn_url,
            'second_btn_text'=>$this->second_btn_text,
            'second_btn_url'=>$this->second_btn_url,

        ];
    }
}
