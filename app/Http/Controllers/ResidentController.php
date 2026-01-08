<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function index()
    {
        // The dot (.) represents the folder slash (/)
        // This looks for: resources/views/residents/index.blade.php
        return view('residents.index');
    }
}