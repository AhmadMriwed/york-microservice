<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CategoryTranslation extends Model
{
    protected $connection = 'main';
    public $timestamps = false;
    protected $fillable = ['title', 'description'];
    // protected $fillable = ['title', 'description', 'category_id', 'locale'];
// public function translation(): HasOne
// {
//   return $this->hasOne(Category::class, 'category_id');
// }
}
