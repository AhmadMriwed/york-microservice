<?php

namespace App\Http\Controllers;

use App\Http\Resources\CounterResource;
use App\Models\Counter;
use App\Http\Requests\StoreCounterRequest;
use App\Http\Requests\UpdateCounterRequest;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCounterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Counter $counter)
    {
        return CounterResource::make($counter)
            ->additional(['message' => 'Retrieved successfully']);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Counter $counter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCounterRequest $request, Counter $counter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Counter $counter)
    {
        //
    }
}
