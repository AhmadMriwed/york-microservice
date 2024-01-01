<?php

namespace App\Http\Clients;


class VenueClient extends BaseClients{
    private $VENUE='venue';
    public function getAllVenue()
    {  
        return $this->sendApiRequest("GET",$this->VENUE);
    }
    public function getVenueById(string $id)
    {
        return $this->sendApiRequest("GET",$this->VENUE.'/'.$id);
    }
}