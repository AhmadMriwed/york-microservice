<?php

namespace App\Http\Clients;


class CategoryClient extends BaseClients{
    private $CATEGORY='category';
    public function getAllCategory()
    {
        
        $language = request()->header('Accept-Language', 'en');

        return $this->sendApiRequest("GET",$this->CATEGORY, [], [], [
        ]);
    }
    public function getCategoryById(string $id)
    {
        $language = request()->header('Accept-Language', 'en'); 

        return $this->sendApiRequest("GET", $this->CATEGORY . '/' . $id, [], [], [
        ]);
    }
}
