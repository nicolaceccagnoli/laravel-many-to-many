<?php

namespace App\Http\Controllers;

//Models
use App\Models\Project;
use App\Models\Type;


use Illuminate\Http\Request;

// Helper
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        
        return view("projects.index", compact("projects"));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        $types = Type::all();

        $project = Project::where('slug', $slug)->firstOrFail();

        return view("projects.show", compact("project", 'types'));
    }

}
