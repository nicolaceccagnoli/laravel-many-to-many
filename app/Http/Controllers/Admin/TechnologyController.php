<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Form Request
use App\Http\Requests\Technologies\StoreTechnologyRequest;
use App\Http\Requests\Technologies\UpdateTechnologyRequest;

// Models
use App\Models\Technology;

// Helper
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $technologyDataRequest = $request->validated();

        $technologyDataRequest['slug'] = Str::slug($technologyDataRequest['title']);

        $technology = Technology::create($technologyDataRequest);

        return redirect()->route('admin.technologies.show',['technology'=>$technology->slug]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();

        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, string $slug)
    {
        $technologyDataRequest = $request->validated();

        $technology = Technology::where('slug', $slug)->firstOrFail();

        $technologyDataRequest['slug'] = Str::slug($technologyDataRequest['title']);

        $technology->update($technologyDataRequest);

        return redirect()->route('admin.technologies.show',['technology'=>$technology->slug]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index');
    }
}
