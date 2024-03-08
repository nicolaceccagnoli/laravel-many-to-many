<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Type;

// Helper
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        
        return view("types.index", compact("types"));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $type = Type::where('slug', $slug)->firstOrFail();

        return view("types.show", compact("type"));
    }

}
