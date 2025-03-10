<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class BaseModel extends Model implements TranslatableContract
{
    use Translatable;

 
    public function getTranslationOrDefault(string $attribute)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->translate($locale)->{$attribute} ?? $this->translate('en')->{$attribute} ?? null;
    }


    public function getAttribute($key)
    {
        if (isset($this->translatedAttributes) && in_array($key, $this->translatedAttributes)) {
            return $this->getTranslationOrDefault($key);
        }
        return parent::getAttribute($key);
    }



    // /**
    //  * 
    //  *
    //  * @return array
    //  */
    // public function getAllTranslations()
    // {
    //     $translations = [];
        
    //     foreach ($this->translations as $translation) {
    //         foreach ($this->translatedAttributes as $attribute) {
    //             $translations[$translation->locale][$attribute] = $translation->{$attribute};
    //         }
    //     }

    //     return $translations;
    // }

   /**
     * 
     *
     * @return array
     */
    public function getAllTranslations()
    {
        $translations = [];
        
       
        $locales = ['ar', 'en']; 
        // $locales = config('translatable.locales');
        foreach ($this->translatedAttributes as $attribute) {
        
            $translations[$attribute] = ['origin' => $this->{$attribute}];

            foreach ($locales as $locale) {
                $translations[$attribute][$locale] = $this->translate($locale) ? $this->translate($locale)->{$attribute} : null;
            }
        }

        return $translations;
    }



   
public static function boot()
{
    parent::boot();

    static::saving(function ($model) {
        $model->processTranslations();
    });
}

public function processTranslations()
{

    $locales = config('translatable.locales');

    $flatLocales = $this->flattenLocales($locales);


    $usedLocales = [];

    foreach ($this->translatedAttributes as $attribute) {
        foreach ($flatLocales as $locale) {
            $requestKey = "{$attribute}.{$locale}";
            if (request()->has($requestKey)) {
                $usedLocales[] = $locale;
            }
        }
    }


    $usedLocales = array_unique($usedLocales);

    foreach ($this->translatedAttributes as $attribute) {
        foreach ($usedLocales as $locale) {
            $requestKey = "{$attribute}.{$locale}";
            $value = request()->input($requestKey, null);

            if (is_array($value)) {
                $value = implode(" ", $value); 
            }

            $this->translateOrNew($locale)->{$attribute} = $value;
        }
    }
}

private function flattenLocales($locales)
{
    $flatLocales = [];

    foreach ($locales as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $subValue) {
                $flatLocales[] = $subValue;
            }
        } else {
            $flatLocales[] = $value;
        }
    }

    return $flatLocales;
}

    

}
