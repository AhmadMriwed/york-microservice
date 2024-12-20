<?php

namespace App\Http\Controllers;

use App\Http\Resources\CounterResource;
use App\Models\Counter;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CounterResource::collection(Counter::get())
            ->additional(['message' => 'Retrieved successfully']);

    }


    /**
     * Display the specified resource.
     */
    public function show(Counter $counter)
    {
        return CounterResource::make($counter)
            ->additional(['message' => 'Retrieved successfully']);

    }

}
