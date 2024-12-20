<?php

namespace App\Http\Controllers;

use App\Http\Resources\SliderResource;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SliderResource::collection(Slider::get())
            ->additional(['message' => 'Retrieved successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return SliderResource::make($slider)
            ->additional(['message' => 'Retrieved successfully']);
    }

}
