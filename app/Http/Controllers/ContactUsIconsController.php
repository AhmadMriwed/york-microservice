<?php

namespace App\Http\Controllers;



use App\Http\Resources\ContactUsIconsResource;
use App\Models\ContactUsIcons;

class ContactUsIconsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $icons = ContactUsIcons::with('type')->get();
        return ContactUsIconsResource::collection($icons)
            ->additional(['message' => 'Icons retrieved successfully.']);
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
    public function store(StoreContactUsIconsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactUsIcons $contactUsIcons)
    {
        return ContactUsIconsResource::make($contactUsIcons->load('type'))
            ->additional(['message' => 'Icon retrieved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUsIcons $contactUsIcons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactUsIconsRequest $request, ContactUsIcons $contactUsIcons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUsIcons $contactUsIcons)
    {
        //
    }
}
