<?php

namespace App\Http\Controllers;
use App\Models\Resident;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    // This function handles the logic
public function index()
{
    // Fetch all records from the 'residents' table
    // equivalent to: SELECT * FROM residents
    $residents = Resident::all();

    return view('hello', compact('residents'));
}
}