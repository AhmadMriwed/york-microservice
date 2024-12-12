<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
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
            'full_name'=>$this->full_name,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'gender'=>$this->gender,
            'address'=>$this->address,
            'notes'=>$this->notes,
            'course_code' =>$this->course_code,
            'course_title'=>$this->course_title,
            'course_venue'=>$this->course_venue,
            'course_category'=>$this->course_category,
            'course_start_date'=>$this->course_start_date,
             'course_end_date'=>$this->course_end_date,
        ];
    }
}
