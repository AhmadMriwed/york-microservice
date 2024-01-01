<?php

namespace App\Http\Controllers;

use App\Http\Clients\BaseClients;
use Illuminate\Http\Request;

class TempControler extends Controller
{
    public function micro(Request $request)
    {
        error_log(json_encode($request->header()));
       // new BaseClients;
       return 
       (new BaseClients)->sendApiRequest(
        
       );
    }
    public function tst1()
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
