<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Type;

// Form Request
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\EditTypeRequest;

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

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $validatedTypeData = $request->validated();   

        $validatedTypeData['slug'] = Str::slug($validatedTypeData['title']);

        $type = Type::create($validatedTypeData);

        return redirect()->route('admin.types.show',['type'=>$type->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        $type = Type::where('slug', $slug)->firstOrFail();

        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditTypeRequest $request, string $slug)
    {
        $validatedTypeRequest = $request->validated();   

        $type = Type::where('slug', $slug)->firstOrFail();

        $validatedTypeRequest['slug'] = Str::slug($validatedTypeRequest['title']);

        $type->update($validatedTypeRequest);

        return redirect()->route('admin.types.show',['type'=>$type->slug]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index');
    }
}
