<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }
}