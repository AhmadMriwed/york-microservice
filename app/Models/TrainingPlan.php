<?php

namespace App\Models;

use App\Models\Files;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPlan extends Model
{
    use HasFactory;

    public function file()
    {
        return $this->belongsTo(Files::class,'file_id');
    }
}
