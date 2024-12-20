<?php

namespace App\Http\Controllers;

use App\Models\aboutUs;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return aboutUs::get();
    }
}
