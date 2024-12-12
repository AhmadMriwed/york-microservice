<?php

namespace App\Models;

use App\Models\TrainingPlan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public function trainingPlan()
    {
        return $this->hasOne(TrainingPlan::class,'file_id');
    }
}
