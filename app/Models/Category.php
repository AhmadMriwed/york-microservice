<?php

namespace App\Models;

use App\Models\BaseModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends BaseModel 
{
  protected $connection = 'main';
    use HasFactory;
    const CATEGORY='Media/Category';

    public $translatedAttributes = ['title', 'description'];

    protected $fillable = ['img', 'imgicon'];


    // public function translations(): HasMany
    // {
    //   return $this->hasMany(CategoryTranslation::class,'category_id');
    // }

}
