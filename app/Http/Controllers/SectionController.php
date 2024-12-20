<?php

namespace App\Http\Controllers;

use App\Http\Resources\SectionResource;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SectionResource::collection(Section::get())
            ->additional(['message' => 'Retrieved successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return SectionResource::make($section)
            ->additional(['message' => 'Retrieved successfully']);

    }

}
