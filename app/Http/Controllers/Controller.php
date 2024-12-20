<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use OpenApi\Attributes as api;

#[
    api\Info(version: "1.0.0",description: "York academy",title:"York academy" ),
    api\Server(url: "http://127.0.0.1:8000/api")

 ]
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
