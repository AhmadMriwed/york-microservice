<?php

namespace App\Http\Controllers;

use App\Http\Resources\FrequentlyQuestionResource;
use App\Models\FrequentlyQuestion;

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
     * Display the specified resource.
     */
    public function show(FrequentlyQuestion $frequentlyQuestion)
    {
        return FrequentlyQuestionResource::make($frequentlyQuestion)
            ->additional(['message' => 'Retrieved successfully']);
    }

}
