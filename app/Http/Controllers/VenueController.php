<?php

namespace App\Http\Controllers;

use App\Http\Clients\VenueClient;
use App\Http\Controllers\Controller;

class VenueController extends Controller
{

    private $venueClient;
    public function __construct()
    {
        $this->venueClient = new VenueClient();
      
    }

    public function getAllVenue()
    {  
        return $this->venueClient->getAllVenue();
    }
    public function getVenueById(string $id)
    {
        return $this->venueClient->getVenueById($id);
    }
}



