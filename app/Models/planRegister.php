<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_plan_id',
        'full_name',
        'phone',
        'email',
    ];

    public function training_plan()
    {
        return $this->belongsTo(TrainingPlan::class,'training_plan_id');
    }
}
