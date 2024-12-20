<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ClientResource::collection(Client::get())
            ->additional(['message' => 'Retrieved successfully']);

    }


    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return ClientResource::make($client)
            ->additional(['message' => 'Retrieved successfully']);

    }


}
