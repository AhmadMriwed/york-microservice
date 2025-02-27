<?php

namespace App\Http\Clients;


class VenueClient extends BaseClients{
    private $VENUE='venue';
    public function getAllVenue()
    {
        $language = request()->header('Accept-Language', 'en');

        return $this->sendApiRequest("GET",$this->VENUE, [], [], [
            'Accept-Language' => $language
        ]);
    }
    public function getVenueById(string $id)
    {
        $language = request()->header('Accept-Language', 'en');

        return $this->sendApiRequest("GET",$this->VENUE.'/'.$id, [], [], [
            'Accept-Language' => $language
        ]);
    }
}
