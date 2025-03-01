<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = [
        'type_id',
        'title',
        'description',
        'image'
    ];

    public $translatable = ['title','description'];

    public function sectionType()
    {
        return $this->belongsTo(SectionType::class, 'type_id');
    }
}
