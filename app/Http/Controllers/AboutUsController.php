<?php

namespace App\Http\Controllers;

use App\Models\about_us;
use App\Http\Requests\Storeabout_usRequest;
use App\Http\Requests\Updateabout_usRequest;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return about_us::all();
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
    public function store(Storeabout_usRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(about_us $about_us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(about_us $about_us)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateabout_usRequest $request, about_us $about_us)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(about_us $about_us)
    {
        //
    }
}
