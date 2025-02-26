<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'title',
        'description',
        'image'
    ];

    public function sectionType()
    {
        return $this->belongsTo(SectionType::class, 'type_id');
    }
}
