<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactUsResource;
use App\Models\ContactUs;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContactUsResource::collection(ContactUs::get())
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
    public function store(StoreContactUsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contactUs)
    {
        return ContactUsResource::make($contactUs)
            ->additional(['message' => 'Retrieved successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactUsRequest $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
