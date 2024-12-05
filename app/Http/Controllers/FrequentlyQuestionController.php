<?php

namespace App\Http\Controllers;

use App\Http\Resources\FrequentlyQuestionResource;
use App\Models\FrequentlyQuestion;
use App\Http\Requests\StoreFrequentlyQuestionRequest;
use App\Http\Requests\UpdateFrequentlyQuestionRequest;

class FrequentlyQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return FrequentlyQuestionResource::collection(FrequentlyQuestion::get())
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
    public function store(StoreFrequentlyQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FrequentlyQuestion $frequentlyQuestion)
    {
        return FrequentlyQuestionResource::make($frequentlyQuestion)
            ->additional(['message' => 'Retrieved successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FrequentlyQuestion $frequentlyQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFrequentlyQuestionRequest $request, FrequentlyQuestion $frequentlyQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FrequentlyQuestion $frequentlyQuestion)
    {
        //
    }
}
