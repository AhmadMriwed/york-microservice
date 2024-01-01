<?php

namespace App\Http\Clients;


class CategoryClient extends BaseClients{
    private $CATEGORY='category';
    public function getAllCategory()
    {  
        return $this->sendApiRequest("GET",$this->CATEGORY);
    }
    public function getCategoryById(string $id)
    {
        return $this->sendApiRequest("GET",$this->CATEGORY.'/'.$id);
    }
}