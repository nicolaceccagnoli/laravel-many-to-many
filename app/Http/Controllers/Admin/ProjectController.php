<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

// Form Request
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

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

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validatedProjectData = $request->validated();


        $validatedProjectData['slug'] = Str::slug($validatedProjectData['title']);

        $project = Project::create($validatedProjectData);

        // Se ho settato una tecnologia allora
        if (isset($validatedProjectData['technologies'])) {

            // Per ogni tecnologia settata
            foreach ($validatedProjectData['technologies'] as $technologyId) {

                // Assegno il suo id al progetto
                $project->technologies()->attach($technologyId);
            }
        }

        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $technologies = Technology::all();

        $types = Type::all();

        $project = Project::where('slug', $slug)->firstOrFail();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $slug)
    {
        $validatedProjectData = $request->validated();

        $project = Project::where('slug', $slug)->firstOrFail();

        $validatedProjectData['slug'] = Str::slug($validatedProjectData['title']);

        $project->update($validatedProjectData);

        if (isset($validatedProjectData['technologies'])) {
            $project->technologies()->sync($validatedProjectData['technologies']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show',['project'=>$project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {   
        $project = Project::where('slug', $slug)->firstOrFail();
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
