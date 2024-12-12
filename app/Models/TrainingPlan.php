<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPlan extends Model
{
    use HasFactory;

    public function file()
    {
        return $this->belongsTo(File::class,'file_id');
    }

    public function plan(){
        return $this->hasMany(planRegister::class,'training_plan_id');
    }
}
