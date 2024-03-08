<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Technology;

// Helper
use Illuminate\Support\Str;


class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();
        
        return view("technologies.index", compact("technologies"));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();

        return view("technologies.show", compact("technology"));
    }
}
