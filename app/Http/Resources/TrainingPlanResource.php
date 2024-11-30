<?php

namespace App\Http\Resources;

use App\Http\Resources\FilesResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingPlanResource extends JsonResource
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
            'title'=>$this->title,
            'sub_title'=>$this->sub_title,
            'image'=>$this->image,
            'file'=>$this->file?FilesResource::make($this->file):null,
            'year'=>$this->year,
        ];
    }
}
