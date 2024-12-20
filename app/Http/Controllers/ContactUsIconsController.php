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
     * Display the specified resource.
     */
    public function show(ContactUsIcons $contactUsIcons)
    {
        return ContactUsIconsResource::make($contactUsIcons->load('type'))
            ->additional(['message' => 'Icon retrieved successfully.']);
    }

}
