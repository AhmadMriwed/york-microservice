<?php

namespace App\Http\Controllers;

use App\Http\Clients\BaseClients;
use Illuminate\Http\Request;

class TempControler extends Controller
{
    public function temp()
    {
       // new BaseClients;
       return (new BaseClients)->sendApiRequest(
        
       );
    }

    public function helloWorld()
    {
        return "Hello, World!";
    }
}
